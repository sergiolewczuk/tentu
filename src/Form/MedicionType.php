<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MedicionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('altura', TextType::class)
            ->add('peso', TextType::class)
            ->add('pesoHabitual', TextType::class)
            ->add('enAnios', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar', 'attr' => array('class' => 'btn btn-success m-btn m-btn--icon')))
        ;
    }
}