<?php

namespace App\Form;

use App\Entity\CarSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarSearchType extends AbstractType
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
            ->add('brand', EntityType::class, [
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
            'data_class' => CarSearch::class,
        ]);
    }
}
