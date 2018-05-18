<?php

namespace AppBundle\Controller;


use AppBundle\Form\Type\CamioneroType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Camionero;

class CamioneroController extends Controller
{
    /**
     * @Route("/lorry_driver", name="lorry_driver")
     */
    public function showLorryDrivers(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Camionero')->findAll();
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
            try {
                $em->flush();
                return $this->redirectToRoute('lorry_drivers');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('lorry_driver/form.html.twig', [
            'formulario' => $form->createView(),
            'lorryDriver' => $lorryDriver
        ]);
    }

}