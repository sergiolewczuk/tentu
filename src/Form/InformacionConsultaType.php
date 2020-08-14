<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\MotivoConsulta;

class InformacionConsultaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unMotivoConsulta', EntityType::class, array(
                'class' => MotivoConsulta::class,
                'choice_label' => 'getNombre',
            ))
            ->add('medio', TextType::class)
            ->add('expectativa', TextType::class)
            ->add('fumador', ChoiceType::class, array(
                'choices'  => array(
                    'Si' => true,
                    'No' => false,
                ),
            ))
            ->add('alcohol', ChoiceType::class, array(
                'choices'  => array(
                    'Si' => true,
                    'No' => false,
                ),
            ))
            ->add('save', SubmitType::class, array('label' => 'Guardar', 'attr' => array('class' => 'btn btn-success m-btn m-btn--icon')))
        ;
    }
}