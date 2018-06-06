<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Camion;
use AppBundle\Form\Type\CamionType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CamionController extends Controller
{
    /**
     * @Route("/lorries", name="lorries")
     */
    public function showLorry(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Camion')->findAllWithoutExecute();
        $query = $em->createQuery($query);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('lorry/index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * @Route(path="/lorry_new/", name="new_lorry")
     * @Route(path="/lorry_edit/{lorry}", name="edit_lorry")
     * */
    public function lorryDAlter(Request $request, Camion $lorry = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $lorry) {
            $lorry = new Camion();
            $em->persist($lorry);
        }

        $form = $this->createForm(camionType::class, $lorry);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('lorries');
            }
            catch (\Exception $e) {
                dump($e);
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('lorry/form.html.twig', [
            'formulario' => $form->createView(),
            'lorry' => $lorry
        ]);
    }

    /**
     * @Route(path="/lorry_del/{lorryID}", name="delete_lorry")
     * */
    public function deleteLorry($lorryID) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $lorry = $em->getRepository('AppBundle:Camion')->findOneBy(array('id' => $lorryID));
        $em->remove($lorry);
        try {
            $em->flush();
        } catch (OptimisticLockException $e) {
            $this->addFlash('error', 'No se ha podido eliminar');
            return $e;
        }

        return 'true';
    }


}