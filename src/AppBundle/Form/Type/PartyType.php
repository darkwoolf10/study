<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Party;
use AppBundle\Entity\Shop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('toy', ChoiceType::class, [
                'choices'  => array(
                    'soft toy' => 'soft toy',
                    'doll' => 'doll',
                    'model of technology' => 'model of technology',
                    'constructor' => 'constructor',
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
            ->add('shop', EntityType::class, [
                'class' => Shop::class,
                'choice_label' => 'id',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create Party',
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Party::class,
        ]);
    }
}