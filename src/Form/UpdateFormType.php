<?php


namespace App\Form;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class  UpdateFormType extends AbstractType
{
   

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('email', EmailType::class, [
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control my-2', 'placeholder' => 'Type Email', 'type' => 'email','value'=>"abs"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type a Email address',
                    ]),
                ]
            ])
            ->add('username', TextType::class, [
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control my-2', 'placeholder' => 'Type Username'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type Your name',
                    ]),
                ]
            ])
            ->add('roles',ChoiceType::class,
                array(
                    'choices' => array(
                        'ROLE_ADMIN' => true,
                        'ROLE_USER' => true,
                    )

                )
            );


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
