<?php


namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\UpdateFormType;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DeleteUserController extends AbstractController
{
    /**
     * @Route("/delete/user/{user_id}/")
     */
    function update_user($user_id, Request $request): Response
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


}
