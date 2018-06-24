<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Party;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class PartyController extends Controller
{
    /**
     * @Route("/party", name="party")
     */
    public function indexAction(Request $request)
    {

        $party = new Party();

        $form = $this->createFormBuilder($party)
            ->add('toy', ChoiceType::class, [
                'choices'  => array(
                    'soft toy' => null,
                    'doll' => null,
                    'model of technology' => null,
                    'constructor' => null,
                ),
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('price', MoneyType::class, [
                'currency'=>'USD',
            ])
            ->add('quntity', IntegerType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Create Party',
            ])
            ->getForm();
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