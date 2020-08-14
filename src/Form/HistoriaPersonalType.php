<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\FuncionIntestinal;
use App\Entity\ActividadFisica;
use App\Entity\Suenio;

class HistoriaPersonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unaFuncionIntestinal', EntityType::class, array(
                'class' => FuncionIntestinal::class,
                'choice_label' => 'getNombre',
            ))
            ->add('unCiclo', EntityType::class, array(
                'class' => Suenio::class,
                'choice_label' => 'getNombre',
            ))
            ->add('unaActividadFisica', EntityType::class, array(
                'class' => ActividadFisica::class,
                'choice_label' => 'getNombre',
            ))
            ->add('queActividad', TextType::class)
            ->add('cuandoCuantas', TextType::class)
            ->add('actividadLaboral', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar', 'attr' => array('class' => 'btn btn-success m-btn m-btn--icon')))
        ;
    }
}