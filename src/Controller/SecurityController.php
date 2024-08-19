<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Eğer kullanıcı zaten giriş yapmışsa, ana sayfaya yönlendir.
        if ($this->getUser()) {
            return $this->redirect('default/index.html.twig');
        }

        // Hatalı giriş varsa, hata mesajını al
        $error = $authenticationUtils->getLastAuthenticationError();

        // Son giriş denemesi kullanıcı adı (şifre boşsa)
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        // Bu metod sadece Symfony'nin logout özelliği tarafından çağrılır
    }
}
