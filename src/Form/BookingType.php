<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Car;
use App\Entity\Model;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('pickLocation', ChoiceType::class, [
            'choices' => [
                'Bordeaux' => 'Bordeaux',
                'Paris' => 'Paris',
                'Lyon'  => 'Lyon'
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
        ->add('car', EntityType::class, [
            'class' => Car::class,
            'choice_label' =>'brand',
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
            'data_class' => Booking::class,
        ]);
    }
}
