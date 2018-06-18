<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Camionero;
use AppBundle\Form\Type\CamioneroType;
use AppBundle\Resources\Validator;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CamioneroController extends Controller
{
    /**
     * @Route("/lorry_driver", name="lorry_driver")
     */
    public function showLorryDrivers(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Camionero')->findAllWithoutExecute();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('lorry_driver/index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * @Route(path="/ldrivernew/", name="new_lorryDriver")
     * @Route(path="/ldriveredit/{lorryDriver}", name="edit_lorryDriver")
     * */
    public function lorryDriverAlter(Request $request, Camionero $lorryDriver = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $lorryDriver) {
            $lorryDriver = new Camionero();
            $em->persist($lorryDriver);

        }

        $form = $this->createForm(camioneroType::class, $lorryDriver);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $v = new Validator();
            if($v->isValid($lorryDriver->getDni())) {
                try {
                    $em->flush();
                    return $this->redirectToRoute('lorry_driver');
                }
                catch (\Exception $e) {
                    $this->addFlash('error', 'No se han podido guardar los cambios');
                }

            } else {
                $this->addFlash('error', 'DNI/NIE incorrecto');
                return $this->render('lorry_driver/form.html.twig', [
                    'formulario' => $form->createView(),
                    'lorryDriver' => $lorryDriver
                ]);
            }
        }
        return $this->render('lorry_driver/form.html.twig', [
            'formulario' => $form->createView(),
            'lorryDriver' => $lorryDriver
        ]);
    }

    /**
     * @Route(path="/lorry_driver_del/{id}", name="delete_lorrydriver")
     * */
    public function deleteLorryDriver($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $lorryDriver = $em->getRepository('AppBundle:Camionero')->findOneBy(array('id' => $id));
        $em->remove($lorryDriver);
        try {
            $em->flush();
        } catch (OptimisticLockException $e) {
            $this->addFlash('error', 'No se ha podido eliminar');
            return $e;
        }

        return 'true';
    }


}