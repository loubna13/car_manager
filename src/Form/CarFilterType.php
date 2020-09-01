<?php

namespace App\Form;

use App\Entity\Car;
use App\Form\CarType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('brand', TextType::class, [
            'required' => false
        ])
        ->add('year', IntegerType::class, [
            'required' => false
        ])
        ->add('price', IntegerType::class, [
            'required' => false
        ])
        ->add('image', TextType::class, [
            'required' => false
        ])
        ->add('isNew', ChoiceType::class, [
            'choices' => [
                'yes' => 'yes',
                'no' => 'no'
            ],
            'required' => false
        ])
    ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
