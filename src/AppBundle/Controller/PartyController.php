<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\PartyType;
use AppBundle\Entity\Party;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PartyController extends Controller
{
    /**
     * @Route("/party", name="party")
     */
    public function indexAction(Request $request)
    {
        $party = new Party();

        $form = $this->createForm(PartyType::class, $party);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($party);
            $em->flush();
            return $this->redirectToRoute('party');
        }

        // replace this example code with whatever you need
        return $this->render('default/party.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}