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
     * @Route("/update/roles/{user_id}/")
     */
    function update_user($user_id,Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UpdateFormType::class, $user);
        $entityManager = $this->getDoctrine()->getManager();
        $user_table = $entityManager->getRepository(User::class)->find($user_id);
        $email = $user_table->getEmail();
        $updateFrom= new UpdateFormType($email);
        $updateFrom->setter($email);
        $updateFrom->getter();


        return $this->render('/user/update_user.html.twig',[
        'updateUserForm' => $form->createView(),
            'userEmail'=>$email
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

}