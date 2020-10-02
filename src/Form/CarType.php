<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Model;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand')
            ->add('year')
            ->add('price')
            ->add('image')
            ->add('imageFile',VichImageType::class)
            ->add('seats')
            ->add('transmission' ,ChoiceType::class, [
                'choices' => [
                    'Automatique' => 'Automatique',
                    'Manuelle' => 'Manuelle'],
            ])
        
            ->add('isNew' ,ChoiceType::class, [
                'choices' => [
                    'New' => 'New',
                    'Used' => 'Used'],
            ])
            ->add('model', EntityType::class, [
                'class' => Model::class,
                'choice_label' =>'label',
                'attr' => [
                    'class' => 'custom-select model-choose'
                ],
                'required' => true
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
