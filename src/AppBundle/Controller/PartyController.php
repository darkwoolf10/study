<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Shop;
use AppBundle\Form\Type\PartyType;
use AppBundle\Entity\Party;
use Doctrine\ORM\EntityManagerInterface;
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
            return $this->redirectToRoute('shop');
        }

        // replace this example code with whatever you need
        return $this->render('default/party.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/party/{id}/del", name="del_toy")
     */
    public function delToyAction($id, EntityManagerInterface $em)
    {
        $party = $em->getRepository('AppBundle:Party')
            ->find($id);

        if ($party->getQuntity() == 1) {
            $em->remove($party);
            $em->flush();
        } else {
            $party->delToy();
            $em->persist($party);
            $em->flush();
        }
        return $this->redirectToRoute('shop');
    }
}