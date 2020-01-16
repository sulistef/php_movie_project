<?php

namespace App\Controller;

use App\Entity\User;

use App\Security\UserAuthenticator;
use App\Form\UpdateProfileFormType;
use App\Form\ResetPasswordFormType;
use App\Form\DeleteUserFormType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\FormError;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;

use Twig\Environment;

class AccountController extends AbstractController
{
    /**
     * @Route ("/user/account", name="myaccount")
     */
    public function myAccount(Request $request, UserInterface $user) {

        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(UpdateProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->render('pages/home.html.twig');
        } else {

            //on affiche le formulaire pour modifier ses données
            
            return $this->render('user/updateprofile.html.twig', [
                'updateForm' => $form->createView(),
            ]);

        }

    }

    /**
     * @Route ("/user/delete", name="deleteuser")
     */
    public function userDelete(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form = $this->createForm(DeleteUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager->remove($user);
            $entityManager->flush();
            $user = null;
            return $this->redirectToRoute('home');
        } else {

            //on affiche le formulaire pour modifier ses données

            return $this->render('user/deleteprofile.html.twig', [
                'delForm' => $form->createView(),
            ]);

        }
    }

    /**
     * @Route ("/user/resetPass", name="resetPass")
     */
    public function resetPass(Request $request, UserPasswordEncoderInterface $passwordEncoder) {

        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form = $this->createForm(ResetPasswordFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $oldPassword = $form->get('oldPassword')->getData();

            if (password_verify($oldPassword, $user->getPassword())) {
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('notice', 'Password has been updated');
                return $this->redirectToRoute('myaccount');
            } else {
                $form->addError(new FormError('The current password is not correct'));
            }
        }

        return $this->render('user/resetpass.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}