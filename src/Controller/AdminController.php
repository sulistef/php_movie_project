<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\EditUserFormType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route ("/admin/users", name="adminUsers")
     */
    public function listUsers() {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('admin/allusers.html.twig', ['users' => $users]);
    }

    /**
     * @Route ("/admin/edituser", name="adminEditUser")
     */
    public function editUser(Request $request) {
        if(isset($_GET['id'])) {
            $userId = $_GET['id'];
        } else {
            return $this->render('pages/home.html.twig');
        }

//        echo "userId = $userId<br />";

        $entityManager = $this->getDoctrine()->getManager();
        $_user = $entityManager->getRepository(User::class)->findOneBy(['id' => $userId]);

//        echo $user->getUsername() ."<br />";

        // formulaire d'edition d'un user
        $form = $this->createForm(EditUserFormType::class, $_user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

                $entityManager->persist($_user);
                $entityManager->flush();

            $this->addFlash('notice', 'User updated');
            return $this->redirectToRoute('adminUsers');
        }

        return $this->render('admin/edituser.html.twig', array(
            'form' => $form->createView(), 'id' => $_user->getId()
        ));

//        exit(0);
        return $this->render('pages/home.html.twig');
    }
}