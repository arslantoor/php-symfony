<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class Home  extends AbstractController
{
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/checklist")
     */
    function checklist()
    {
        $task_list = ['Introduction',
            'Training Overview',
            'Symfony Setup',
            'Symfony Create Page',
            'Routing',
            'Controller',
            'Templates',
            'Configuration',
            'Forms',
            'Database and Doctrine ORM',
            'Services Container',
            'Security',
            'Logging',
            'Validation',
            'Bundles',
            'Console',
            'Translations',
            'Easy Admin bundle'];
        return $this->render('checklist.html.twig',['task_list'=>$task_list]);
    }
}