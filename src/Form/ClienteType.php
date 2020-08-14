<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Genero;


class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('correo', TextType::class)
            ->add('password', PasswordType::class)
            ->add('dni', TextType::class)
            ->add('nombre', TextType::class)
            ->add('apellido', TextType::class)
            ->add('unGenero', EntityType::class, array(
                'class' => Genero::class,
                'choice_label' => 'getNombre',
            ))
            ->add('telefono', TextType::class)
            ->add('mayor', CheckboxType::class, [
                'required' => false,
            ])
            ->add('aceptacion', CheckboxType::class, [
                'required' => false,
            ])
            ->add('save', SubmitType::class, array('label' => 'Registrarse', 'attr' => array('class' => 'btn btn-success m-btn m-btn--icon')))
        ;
    }

   
}