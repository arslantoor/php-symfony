<?php

namespace App\Admin;
use App\Entity\Checklist;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        if($this->isCurrentRoute('create')) {
            $formMapper->add('password', PasswordType::class,['required' => false]);
        }
        $formMapper->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices' => ['User' => 'ROLE_USER', 'Admin' => 'ROLE_ADMIN']
            ]);
        $formMapper->add('checklist', EntityType::class, [
            'class' => Checklist::class,
            'placeholder' => '--select checklist--'
        ]);
        $formMapper->add('isVerified', CheckboxType::class,['required' => false]);
        $formMapper->add('status', CheckboxType::class,['required' => false]);
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
        $listMapper->addIdentifier('checklist');
        $listMapper->addIdentifier('status');
        $listMapper->addIdentifier('isVerified');
    }
}