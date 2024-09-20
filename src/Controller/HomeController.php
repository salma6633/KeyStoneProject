<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\ProfileFormType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;




class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }




    #[Route('/back', name: 'app_back')]
    public function back(Security $security, UserRepository $userRepository): Response
    {
        $user = $security->getUser();
        $users = $userRepository->findAll(); // Fetch all users

        return $this->render('home/back.html.twig', [
            'title' => 'Welcome',
            'user' => $user,
            'users' => $users, 
        ]);
    }

    #[Route('/back/add', name: 'app_user_add', methods: ['GET', 'POST'])]
public function add(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
{
    $user = new User();
    $form = $this->createForm(RegistrationFormType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $user->setPassword(
            $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            )
        );

        // Set the default role to ROLE_CLIENT
        $user->setRoles(['ROLE_CLIENT']);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_back');
    }

    return $this->render('home/addUser.html.twig', [
        'form' => $form->createView(),
        'title' => 'Add New User',
        'form_action' => 'app_user_add',
        'button_label' => 'Add User',
    ]);
}




    #[Route('/back/edit/{id}', name: 'app_user_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, string $id,UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }
    
        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Only update the password if it is provided
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
            return $this->redirectToRoute('app_back');
        }
        return $this->render('home/user_form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit User',
            'form_action' => 'app_user_edit',
            'button_label' => 'Save Changes',
            'user' => $user, 
        ]);
    }



    
    #[Route('/back/delete/{id}', name: 'app_user_delete')]
    public function delete(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id' => $id]);
        $entityManager->remove($user);
        $entityManager->flush();
    
        return $this->redirectToRoute('app_back');
    }
    

}
