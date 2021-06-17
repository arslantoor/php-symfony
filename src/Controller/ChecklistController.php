<?php


namespace App\Controller;
use App\Entity\Checklist;
use App\Entity\CheckListInfo;
use App\Form\CheckListFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class ChecklistController extends AbstractController
{

    /**
     * @Route ("/checklist", name="checklist")
     */
    public function checklist(UserInterface $user,Request $request)
    {
        $email =$user->getEmail();
        $entityManager = $this->getDoctrine()->getManager();
        $checkList = $entityManager->getRepository(CheckListInfo::class)->findOneBy(['user'=>$user->getId()]);

        return $this->render('checklist.html.twig',['user_check_list'=>$checkList,'user_email'=>$email]);
    }

    /**
     * @Route ("/add/checklist", name="add_checklist")
     */
    public function add_checklist(Request $request){

        $checkList= new Checklist();
        $form = $this->createForm(CheckListFormType::class, $checkList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($checkList);
            $entityManager->flush();
            return $this->redirectToRoute('add_checklist');
        }
        return $this->render('add_checklist_form.html.twig', [
            'checkListForm' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/update/checklist_status/{user_checklist_id}", name="checklist_status")
     */
    public function checklist_status(UserInterface $user,$user_checklist_id):Response{
        $checkList= new Checklist();
        $entityManager = $this->getDoctrine()->getManager();
        $checkList = $entityManager->getRepository(CheckListInfo::class)->findOneBy(['id'=>$user_checklist_id]);

        if ($checkList->getStatus() == true){
            $checkList->setStatus(false);
            $entityManager->flush();
            return $this->redirectToRoute('view_user_checklist');
        }
        else{
            $checkList->setStatus(true);
            $entityManager->flush();
            return $this->redirectToRoute('view_user_checklist');
        }
    }

    /**
     * @Route ("/view/userchecklist", name="view_user_checklist")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function view_user_checklist(UserInterface $user)
    {
        $email =$user->getEmail();
        $entityManager = $this->getDoctrine()->getManager();
        $checkList = $entityManager->getRepository(CheckListInfo::class)->findAll();

        return $this->render('user_checklist.html.twig',['checkList'=>$checkList,'user_email'=>$email]);
    }

}