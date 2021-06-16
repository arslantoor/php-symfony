<?php


namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\UpdateFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    /**
     * @Route("/edit/user/{user_id}/")
     */
    function update_user($user_id)
    {

        $user = new User();
        $entityManager = $this->getDoctrine()->getManager();
        $userData = $entityManager->getRepository(User::class)->find($user_id);
        $email = $userData->getEmail();

        return $this->render('/user/update_user.html.twig',[
            'userEmail'=>$email,
            'userData'=>$userData,
        ]);
    }

    /**
     * @Route("/update/status/{user_id}", name="update-status",methods={"GET"})
     */
    function update_status($user_id,EntityManagerInterface $entityManager){
        $entityManager = $this->getDoctrine()->getManager();
        $user_table = $entityManager->getRepository(User::class)->find($user_id);
        $user_table->setIsVerified(true);
        $entityManager->flush();
        return $this->redirectToRoute('dashboard');

    }
    /**
     * @Route("/delete/user/{user_id}/")
     */
    function delete_user($user_id, Request $request): Response
    {
        $user = new User();
        $entityManager = $this->getDoctrine()->getManager();

        $user_table = $entityManager->getRepository(User::class)->find($user_id);
        if (!$user_table) {
            throw $this->createNotFoundException(
                'No user found for id '.$user_id
            );
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user_table);
        $entityManager->flush();

        return $this->redirectToRoute('dashboard');
    }
    /**
     * @Route("/update/user_record/{user_id}/")
     */
    function update_user_record($user_id,Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $userData = $entityManager->getRepository(User::class)->find($user_id);

        // form request method
        if($request){
        $userName=$request->request->get('username');
        $userEmail=$request->request->get('email');
        $userRole=$request->request->get('role');

        $userData->setUsername($userName);
        $userData->setEmail($userEmail);
        $userData->setRoles([$userRole]);

        $entityManager->flush();
        return $this->redirectToRoute('dashboard');
        }
        return $this->render('/user/update_user.html.twig');
    }

}