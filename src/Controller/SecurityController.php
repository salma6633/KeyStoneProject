<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
use App\Entity\ResetPasswordRequest;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use DateTimeImmutable;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;



class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            // Check the role of the authenticated user and redirect accordingly
            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_back'); // Adjust the route name to your admin dashboard
            } elseif ($this->isGranted('ROLE_CLIENT')) {
                return $this->redirectToRoute('app_home'); // Adjust the route name to your client dashboard
            } else {
                return $this->redirectToRoute('app_home'); // Default redirection
            }
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPasswordForm(): Response
    {
        return $this->render('security/forgot_password.html.twig');
    }

    #[Route('/forgot-password-submit', name: 'app_forgot_password_submit', methods: ['POST'])]
    public function forgotPasswordSubmit(Request $request, MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {
        $email = $request->request->get('email');
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
    
        if (!$user) {
            $this->addFlash('error', 'No user found with this email address.');
            return $this->redirectToRoute('app_forgot_password');
        }
    
        // Generate and store a reset token for the user
        $resetToken = md5(uniqid());
        $expiresAt = new DateTimeImmutable('+1 hour');
        $resetPasswordRequest = new ResetPasswordRequest($user, $expiresAt, $resetToken, md5($resetToken));
        $entityManager->persist($resetPasswordRequest);
        $entityManager->flush();
    
        // Send reset password email
        $email = (new Email())
            ->from('salmalabidi8@gmail.com')
            ->to($user->getEmail())
            ->subject('Reset your password')
            ->html($this->renderView('emails/reset_password.html.twig', [
                'token' => $resetToken,
            ]));
    
        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->addFlash('error', 'An error occurred while sending the email: ' . $e->getMessage());
        }
        
        return $this->redirectToRoute('app_login');
    }
    

    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function resetPasswordForm(string $token, EntityManagerInterface $entityManager): Response
    {
        $resetPasswordRequest = $entityManager->getRepository(ResetPasswordRequest::class)->findOneBy(['selector' => $token]);

        if (!$resetPasswordRequest || $resetPasswordRequest->isExpired()) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/reset_password.html.twig', [
            'token' => $token,
        ]);
    }

    #[Route('/reset-password-submit', name: 'app_reset_password_submit', methods: ['POST'])]
    public function resetPasswordSubmit(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $token = $request->request->get('token');
        $password = $request->request->get('password');

        $resetPasswordRequest = $entityManager->getRepository(ResetPasswordRequest::class)->findOneBy(['selector' => $token]);

        if (!$resetPasswordRequest || $resetPasswordRequest->isExpired()) {
            return $this->redirectToRoute('app_login');
        }

        $user = $resetPasswordRequest->getUser();

        // Encode and set the new password for the user
        $encodedPassword = $passwordHasher->hashPassword($user, $password);
        $user->setPassword($encodedPassword);

        // Remove the reset password request after password reset
        $entityManager->remove($resetPasswordRequest);
        $entityManager->flush();

        return $this->redirectToRoute('app_login');
    }
}

