<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Material;
use AppBundle\Form\Type\MaterialType;
use AppBundle\Form\Type\StockType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StockController extends Controller
{
    /**
     * @Route("/palet_stock", name="palets")
     */
    public function showPalets(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $palet = $em->getRepository('AppBundle:Recipiente')->findOneBy(['tipo' => 'Palet']);

        $form = $this->createForm(StockType::class, $palet);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('saks');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('stock/index.html.twig', [
            'formulario' => $form->createView(),
            'tipo' => $palet
        ]);
    }

    /**
     * @Route("/sack_stock", name="sacks")
     */
    public function showSack(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $sack = $em->getRepository('AppBundle:Recipiente')->findOneBy(['tipo' => 'Sacas']);

        $form = $this->createForm(StockType::class, $sack);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('saks');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('stock/index.html.twig', [
            'formulario' => $form->createView(),
            'tipo' => $sack
        ]);
    }


}