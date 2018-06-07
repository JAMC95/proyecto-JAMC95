<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Material;
use AppBundle\Form\Type\MaterialType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MaterialController extends Controller
{
    /**
     * @Route("/material", name="materials")
     */
    public function showMaterial(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Material')->findAllWithoutExecute();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('material/index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * @Route(path="/materialNew/", name="new_material")
     * @Route(path="/materialEdit/{material}", name="edit_material")
     * */
    public function materialAlter(Request $request, Material $material = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $material) {
            $material = new Material();
            $em->persist($material);

        }

        $form = $this->createForm(MaterialType::class, $material);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('materials');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('material/form.html.twig', [
            'formulario' => $form->createView(),
            'material' => $material
        ]);
    }

    /**
     * @Route(path="/material_del/{id}", name="delete_material")
     * */
    public function deleteLorry($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $ticket = $em->getRepository('AppBundle:Material')->findOneBy(array('id' => $id));
        $em->remove($ticket);
        try {
            $em->flush();
        } catch (OptimisticLockException $e) {
            $this->addFlash('error', 'No se ha podido eliminar');
            return $e;
        }

        return 'true';
    }

}