<?php

namespace App\Form;

use App\Entity\Tarif;
use App\Entity\Category;
use App\Entity\Location;
use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LouerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateStartLocation')
            ->add('dateEndLocation')
            ->add('nomCategory', Category::class)
            ->add('typeCategory')
            ->add('typeAssurance')
            ->add('cautionLocation')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
