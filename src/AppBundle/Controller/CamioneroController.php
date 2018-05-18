<?php

namespace AppBundle\Controller;


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

}