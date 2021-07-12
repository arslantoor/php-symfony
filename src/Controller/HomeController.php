<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    /**
     * @Route ("/dashboard", name="dashboard")
     * @Template()
     */
    public function index(UserInterface $user)
    {
        $email =$user->getEmail();
        return ['user_email'=>$email,];
    }
}