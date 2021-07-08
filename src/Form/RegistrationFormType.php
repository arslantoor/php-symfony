<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class,[
                'attr' => ['autocomplete' => 'new-password','class'=>'form-control my-2', 'placeholder'=>'Type Email','type'=>'email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type a Email address',
                    ]),
                    ]
            ])
            ->add('username',TextType::class,[
                'attr' => ['autocomplete' => 'new-password','class'=>'form-control my-2', 'placeholder'=>'Type Username'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type Your name',
                    ]),
                ]
            ])
            ->add('password', PasswordType::class,[
                'attr' => ['autocomplete' => 'new-password','class'=>'form-control my-2', 'placeholder'=>'Type password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password','class'=>'form-control my-2', 'placeholder'=>'Type plain password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'attr' => ['class'=>'checkbox m-2 my-2'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
