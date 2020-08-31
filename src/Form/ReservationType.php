<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pickLocation', ChoiceType::class, [
                'choices' => [
                    'Bordeaux' => 'Bordeaux',
                    'Paris' => 'Paris',
                ],
                'attr' => [
                    'class' => 'custom-select car-choose'
                ],
                'required' => true
            ])
            ->add('pickDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('returnDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('pickCar', ChoiceType::class, [
                'choices' => [
                    'bmw' => 'bmw',
                    'mercedes' => 'mercedes',
                ],
                'attr' => [
                    'class' => 'custom-select car-choose'
                ],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
