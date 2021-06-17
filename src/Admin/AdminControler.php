<?php

namespace App\Admin;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AdminControler extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper->add('username', TextType::class);
        $formMapper->add('email', EmailType::class);
        $formMapper->add('password', PasswordType::class);
        $formMapper->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices' => ['ROLE_USER' => 'ROLE_USER', 'ROLE_ADMIN' => 'ROLE_ADMIN']
            ]);
        $formMapper->add('isVerified', CheckboxType::class);
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper->add('email');
        $datagridMapper->add('username');
    }
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper->addIdentifier('username');
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('roles');
        $listMapper->addIdentifier('isVerified');
    }
}