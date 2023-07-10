<?php
// src/Form/QuestionType.php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Név',
            'constraints' => [
                new NotBlank([
                    'message' => 'Hiba! Kérjük töltse ki a név mezőt.',
                ]),
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'E-mail',
            'constraints' => [
                new NotBlank([
                    'message' => 'Hiba! Kérjük töltse ki az e-mail mezőt.',
                ]),
            ],
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Üzenet',
            'constraints' => [
                new NotBlank([
                    'message' => 'Hiba! Kérjük töltse ki az üzenet mezőt.',
                ]),
            ],
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Küldés',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
