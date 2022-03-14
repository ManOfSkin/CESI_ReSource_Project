<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class UserProfilController extends AbstractController
{
    #[Route('/user', name: 'user_profil')]
    public function index(UserInterface $user = null): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $auth = $this->isGranted('ROLE_USER');

        return $this->render('user_profil/user_profil.html.twig', [
            'auth' => $auth,
            'user' => $user,
        ]);
    }
}
