<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    /**
     * @Route ("/dashboard", name="dashboard")
     */
    public function index(UserInterface $user)
    {
        $email =$user->getEmail();
        return $this->render('index.html.twig',[
            'user_email'=>$email,
        ]);
    }

}
