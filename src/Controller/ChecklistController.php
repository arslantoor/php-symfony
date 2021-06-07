<?php


namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class ChecklistController extends AbstractController
{

    /**
     * @Route ("/checklist", name="checklist")
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     */
    public function checklist(UserInterface $user)
    {
        $email =$user->getEmail();
        $task_list = ['Introduction','Training Overview',
            'Symfony Setup', 'Symfony Create Page', 'Routing', 'Controller', 'Templates', 'Configuration',
            'Forms', 'Database and Doctrine ORM', 'Services Container', 'Security', 'Logging', 'Validation',
            'Bundles', 'Console', 'Translations', 'Easy Admin bundle'];
        return $this->render('checklist.html.twig',['task_list'=>$task_list,'user_email'=>$email]);
    }
}