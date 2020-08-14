<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\HoraDesayuno;
use App\Entity\HoraAlmuerzo;
use App\Entity\HoraMerienda;
use App\Entity\HoraCena;
use App\Entity\Agua;

class HistoriaAlimentariaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unaHoraDesayuno', EntityType::class, array(
                'class' => HoraDesayuno::class,
                'choice_label' => 'getNombre',
            ))
            ->add('unaHoraAlmuerzo', EntityType::class, array(
                'class' => HoraAlmuerzo::class,
                'choice_label' => 'getNombre',
            ))
            ->add('unaHoraMerienda', EntityType::class, array(
                'class' => HoraMerienda::class,
                'choice_label' => 'getNombre',
            ))
            ->add('unaHoraCena', EntityType::class, array(
                'class' => HoraCena::class,
                'choice_label' => 'getNombre',
            ))
            ->add('unAgua', EntityType::class, array(
                'class' => Agua::class,
                'choice_label' => 'getNombre',
            ))
            ->add('alimentoFavorito', TextType::class)
            ->add('alimentoRechazado', TextType::class)
            ->add('alergiaIntolerancia', TextType::class)
            ->add('otrasAclaraiones', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar', 'attr' => array('class' => 'btn btn-success m-btn m-btn--icon')))
        ;
    }
}