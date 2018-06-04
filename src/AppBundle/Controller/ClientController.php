<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Empresa;
use AppBundle\Form\Type\ClientType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends Controller
{
    /**
     * @Route("/clients", name="client")
     */
    public function showLorry(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $query = $this->getDoctrine()->getRepository('AppBundle:Empresa')->findAllClientes();
        $query = $em->createQuery($query);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('client/index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * @Route(path="/client_new/", name="new_client")
     * @Route(path="/client_edit/{client}", name="edit_client")
     * */
    public function clientAlter(Request $request, Empresa $client = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $client) {
            $client = new Empresa();
            $em->persist($client);
            $client->setEsempresadetransporte(false);

        }

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('client');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('client/form.html.twig', [
            'formulario' => $form->createView(),
            'empresa' => $client
        ]);
    }

}