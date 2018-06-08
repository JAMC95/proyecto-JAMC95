<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Camion;
use AppBundle\Entity\Camionero;
use AppBundle\Entity\Empresa;
use AppBundle\Entity\Obra;
use AppBundle\Entity\Ticket;
use AppBundle\Form\Type\TicketType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpFoundation\Response;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class TicketController extends Controller
{
    /**
     * @Route("/tickets", name="tickets")
     */
    public function showTicket(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Ticket')->findAllWithoutExecute();
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

    /**
     * @Route(path="/ticketNew/", name="new_ticket")
     * @Route(path="/ticketEdit/{ticket}", name="edit_ticket")
      */
    public function materialAlter(Request $request, Ticket $ticket = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null === $ticket) {
            $ticket = new Ticket();
            $em->persist($ticket);
            $ticket->setFecha(date_create(date('Y-m-d H:m:s')));
        }

        $form = $this->createForm(TicketType::class, $ticket);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {

                $em->flush();
                return $this->redirectToRoute('tickets');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('ticket/form.html.twig', [
            'formulario' => $form->createView(),
            'ticket' => $ticket
        ]);
    }

    /**
     * @Route(path="/camion_ticket/{camion}", name="info_camion")
     */
    public function getIdAsociadasCamion(Request $request, Camion $camion = null)
    {
       $info = [];
       $info["camionero"] = $camion->getCamioneroHabitual()->getId();
       $info["empresaTransportes"] = $camion->getEmpresaTransportes()->getId();
       $info["tara"] = $camion->getTara();

       return new JsonResponse($info);

    }

    /**
     * @Route(path="/cliente_ticket/{cliente}", name="info_cliente")
     */
    public function getIdAsociadasCliente(Request $request, Empresa $cliente = null)
    {
        $info = [];
        $info["obraPrincipal"] = $cliente->getObras()[0]->getId();


        return new JsonResponse($info);

    }

    /**
     * @Route("/printTicket/{ticket}", name="ticket_impreso")
     */
    public function printTicket(Ticket $ticket)
    {
        $html = $this->renderView('printer/ticket.html.twig', array(
            'ticket' => $ticket
        ));

        $snappy = $this->get('knp_snappy.pdf');

        $filename = 'ticket' . $ticket->getId();


        return new Response($snappy->getOutputFromHtml($html),200, array(

                'Content-Type'          => 'application/pdf',

                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'

            )

        );
    }

    /**
     * @Route(path="/ticket_del/{id}", name="delete_ticket")
     * */
    public function deleteLorry($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $ticket = $em->getRepository('AppBundle:Ticket')->findOneBy(array('id' => $id));
        $em->remove($ticket);
        try {
            $em->flush();
        } catch (OptimisticLockException $e) {
            $this->addFlash('error', 'No se ha podido eliminar');
            return $e;
        }

        return 'true';
    }

    /**
     * @Route("/reportPrint", name="informeImpreso")
     */
    public function printReport()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:Ticket')->findAllWithoutExecute();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            1,
            3000
        );
        $html = $this->renderView('printer/report.html.twig', array(
            'pagination' => $pagination
        ));
        $snappy = $this->get('knp_snappy.pdf');

        $filename = 'Informe';


        return new Response($snappy->getOutputFromHtml($html),200, array(

                'Content-Type'          => 'application/pdf',

                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'

            )

        );
    }

}