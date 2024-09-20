<?php

// src/Form/RegistrationFormType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Callback; 
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your name']),
                    new Length(['min' => 2, 'minMessage' => 'Your name should be at least {{ limit }} characters']),
                ],
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your last name']),
                    new Length(['min' => 2, 'minMessage' => 'Your last name should be at least {{ limit }} characters']),
                ],
            ])
            ->add('phone', TelType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your phone number']),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a valid email address']),
                    new Length(['min' => 2, 'minMessage' => 'Your email should be at least {{ limit }} characters']),
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'mapped' => false, // This field is not mapped to any property
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
                'constraints' => [
                    new Callback([$this, 'validatePassword']),
                ],
            ])
            
            ->add('terms', CheckboxType::class, [
                'mapped' => false,
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

public function validatePassword($password, ExecutionContextInterface $context)
    {
        $form = $context->getRoot();

        $firstPassword = $form['password']['first']->getData();
        $secondPassword = $form['password']['second']->getData();

        if ($firstPassword !== $secondPassword) {
            $context->buildViolation('The password fields must match.')
                ->addViolation();
        }
    }


}
