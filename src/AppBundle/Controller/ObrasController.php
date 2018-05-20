<?php

namespace AppBundle\Controller;


use AppBundle\Form\Type\ObraType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Obra;

class ObrasController extends Controller
{
    /**
     * @Route("/works", name="works")
     */
    public function showWorks(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Obra')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('works/index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * @Route(path="/worksnew/", name="new_lorryDriver")
     * @Route(path="/worksEdit/{works}", name="edit_lorryDriver")
     * */
    public function lorryDriverAlter(Request $request, Obra $works = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $works) {
            $works = new Obra();
            $em->persist($works);

        }

        $form = $this->createForm(ObraType::class, $works);

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
        return $this->render('works/form.html.twig', [
            'formulario' => $form->createView(),
            'works' => $works
        ]);
    }

}