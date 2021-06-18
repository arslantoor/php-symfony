<?php

namespace App\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
class AdminChecklistControler extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper->add('name');
    }
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper->addIdentifier('name');
    }
}