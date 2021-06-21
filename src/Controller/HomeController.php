<?php

namespace App\Controller;
use app\Entity\User;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
class HomeController extends AbstractController
{


    /**
     * @Route ("/dashboard", name="dashboard")
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     */
    public function index(UserInterface $user)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user_list = $entityManager->getRepository(User::class)->findAll();
        $total=count($user_list);
        $email =$user->getEmail();
        $role = $user->getRoles();
        if ($role[0] === 'ROLE_USER')
        {
            return $this->render('index.html.twig',[
                'user_email'=>$email,'total_user'=>$total
            ]);
        }
        else
        {
            return $this->redirect('/admin/dashboard');
        }
        return $this->render('error/error-403.html.twig');
    }

}
