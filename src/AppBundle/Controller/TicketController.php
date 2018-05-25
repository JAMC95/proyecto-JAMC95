<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Ticket;
use AppBundle\Form\Type\TicketType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends Controller
{
    /**
     * @Route("/tickets", name="tickets")
     */
    public function showTicket(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Ticket')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('ticket/index.html.twig', array(
            'pagination' => $pagination

        ));
    }



}