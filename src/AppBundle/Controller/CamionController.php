<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Camion;
use AppBundle\Form\Type\CamioneroType;
use AppBundle\Form\Type\CamionType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Camionero;

class CamionController extends Controller
{
    /**
     * @Route("/lorries", name="lorries")
     */
    public function showLorry(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Camion')->findAll();
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
                return $this->redirectToRoute('lorry');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('lorry/form.html.twig', [
            'formulario' => $form->createView(),
            'lorry' => $lorry
        ]);
    }

}