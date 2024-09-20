<?php

// src/Controller/ProfileController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = $this->getUser();
        
        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $oldPassword = $form->get('oldPassword')->getData();
            $newPassword = $form->get('newPassword')->getData();

            if ($newPassword && $oldPassword) {
                if ($passwordEncoder->isPasswordValid($user, $oldPassword)) {
                    $newEncodedPassword = $passwordEncoder->encodePassword($user, $newPassword);
                    $user->setPassword($newEncodedPassword);
                } else {
                    $this->addFlash('error', 'Old password is incorrect.');
                }
            }

            $entityManager->flush();
            $this->addFlash('success', 'Profile updated successfully!');
        }

        return $this->render('user/profileClient.html.twig', [
            'form' => $form->createView(),
        ]);
    }



    #[Route('/profileAdmin', name: 'app_profileAdmin')]
    public function profileAdmin(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = $this->getUser();
        
        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $oldPassword = $form->get('oldPassword')->getData();
            $newPassword = $form->get('newPassword')->getData();

            if ($newPassword && $oldPassword) {
                if ($passwordEncoder->isPasswordValid($user, $oldPassword)) {
                    $newEncodedPassword = $passwordEncoder->encodePassword($user, $newPassword);
                    $user->setPassword($newEncodedPassword);
                } else {
                    $this->addFlash('error', 'Old password is incorrect.');
                }
            }

            $entityManager->flush();
            $this->addFlash('success', 'Profile updated successfully!');
        }

        return $this->render('user/profileAdmin.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}
