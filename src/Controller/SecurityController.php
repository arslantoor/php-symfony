<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="login")
     * @template()
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $user = new User();
        $form = $this->createForm(LoginFormType::class, $user);
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last user Email entered by the user
        $lastUserEmail = $authenticationUtils->getLastUserEmail();

        return ['last_useremail' => $lastUserEmail, 'error' => $error,'loginForm' => $form->createView(),];
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}