<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\TipoPatologia;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('resumen', TextareaType::class)
            ->add('cuerpo', TextareaType::class)
            ->add('valor', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar', 'attr' => array('class' => 'btn btn-success m-btn m-btn--icon')))
        ;
    }
}