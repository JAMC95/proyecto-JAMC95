<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Empresa;
use AppBundle\Form\Type\TransportCompanyType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransportCompanyController extends Controller
{
    /**
     * @Route("/transportCompanies", name="tcompanies")
     */
    public function showTransportCompanies(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $query = $this->getDoctrine()->getRepository('AppBundle:Empresa')->findAlltCompanies();
        $query = $em->createQuery($query);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('tCompanies/index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * @Route(path="/tcompany_new/", name="new_tcompany")
     * @Route(path="/transportCompany_edit/{tcompany}", name="edit_transportCompany")
     * */
    public function tCompanyAlter(Request $request, Empresa $tcompnay = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $tcompnay = $em->getRepository('AppBundle:Empresa')->findOneBy(['id' => $request->attributes->get('tcompany')]);
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $tcompnay) {
            $tcompnay = new Empresa();
            $em->persist($tcompnay);
            $tcompnay->setEsempresadetransporte(true);

        }

        $form = $this->createForm(TransportCompanyType::class, $tcompnay);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('tcompanies');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('tCompanies/form.html.twig', [
            'formulario' => $form->createView(),
            'empresa' => $tcompnay
        ]);
    }

    /**
     * @Route(path="/transposrt_delete/{id}", name="delete_tCompany")
     * */
    public function deleteLorryDriver($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $lorryDriver = $em->getRepository('AppBundle:Empresa')->findOneBy(array('id' => $id));
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