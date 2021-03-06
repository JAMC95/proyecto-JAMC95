<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Obra;
use AppBundle\Form\Type\ObraType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ObraController extends Controller
{
    /**
     * @Route("/works", name="works")
     */
    public function showWorks(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Obra')->findAllWithoutExecute();
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
     * @Route(path="/worksnew/", name="new_works")
     * @Route(path="/worksEdit/{works}", name="edit_works")
     * */
    public function worksAlter(Request $request, Obra $works = null)
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
                return $this->redirectToRoute('works');
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

    /**
     * @Route(path="/works_del/{id}", name="delete_work")
     * */
    public function deleteLorryDriver($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('AppBundle:Obra')->findOneBy(array('id' => $id));
        $em->remove($cliente);
        try {
            $em->flush();
        } catch (OptimisticLockException $e) {
            $this->addFlash('error', 'No se ha podido eliminar');
            return $e;
        }

        return 'true';
    }

}