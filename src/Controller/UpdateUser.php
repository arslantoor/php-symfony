<?php


namespace App\Controller;


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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UpdateUser extends AbstractController
{
    /**
     * @Route("/update/roles/{user_id}/")
     */
    function update_user($user_id,Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UpdateFormType::class, $user);
        $entityManager = $this->getDoctrine()->getManager();

        $user_table = $entityManager->getRepository(User::class)->find($user_id);
        $form->handleRequest($request);
//        $userRole=$form->get('roles')->getData();
        $user->setRoles(array('ROLE_ADMIN'));
//        if ($userRole=='2'){
//            dd($userRole);}
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $userRole=$form->get('roles')->getData();
            $user->setRoles(array('ROLE_ADMIN'));
            if ($userRole=='2'){
            dd($userRole);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard');
        }



        return $this->render('/user/update_user.html.twig',[
        'updateUserForm' => $form->createView(),
        ]);
    }

}