<?php


namespace App\Form;
use App\Entity\User;
use Doctrine\DBAL\Types\StringType;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\ChoiceList\Factory\Cache\ChoiceValue;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class  UpdateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control my-2', 'placeholder' => 'Type Email', 'type' => 'email'],
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
            ->add('isVerified',CheckboxType::class,[
                'attr' => ['class'=>'m-2 my-2','type'=>'checkbox'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please Type Your name',
                    ]),
                ]
            ])
            ->add('roles',ChoiceType::class,
                array(
                    'choices' => array(
                        'multiple' => true,
                        'expanded' => true,
                        'Yes' => "yes",
                        'No' => "yes"
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
