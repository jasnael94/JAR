<?php

// src/Controller/LoginController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends AbstractController
{   
    #[Route("/login", name:"login")]
    public function login(Request $request)
    {
        // Si l'utilisateur est déjà authentifié, on le redirige
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        // Vérification des erreurs d'authentification
        if ($request->attributes->get(Security::AUTHENTICATION_ERROR)) {
            // Ajouter un message flash pour l'erreur
            $this->addFlash('error', 'Identifiants incorrects.');
        }

        // Affichage de la page de connexion
        return $this->render('security/login.html.twig');
    }
}
