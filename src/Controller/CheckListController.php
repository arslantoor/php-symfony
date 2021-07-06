<?php


namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class CheckListController
{
    /**
     * @Route ("/checklist", name="checklist")
     * @Template("checklist.html.twig")
     */
    public function checklist(): array
    {
        $task_list = ['Introduction', 'Training Overview',
            'Symfony Setup', 'Symfony Create Page', 'Routing', 'Controller', 'Templates', 'Configuration',
            'Forms', 'Database and Doctrine ORM', 'Services Container', 'Security', 'Logging', 'Validation',
            'Bundles', 'Console', 'Translations', 'Easy Admin bundle'];

        return array("task_list" => $task_list);
    }
}