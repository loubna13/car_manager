<?php

namespace App\Form;

use App\Entity\Search;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minPrice',IntegerType::class,[

                'required' => false,
                'label' => false,
                'attr' => [
                   'placeholder' => 'Budget min'
                ]
            ])
            ->add('maxPrice',IntegerType::class,[

                'required' => false,
                'label' => false,
                'attr' => [
                   'placeholder' => 'Budget max'
                ]
            ])
            ->add('carBrand',TextType::class,[

                'required' => false,
                'label' => false,
                'attr' => [
                   'placeholder' => 'Trier par marque'
                ]
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            
        ]);
    }
}
