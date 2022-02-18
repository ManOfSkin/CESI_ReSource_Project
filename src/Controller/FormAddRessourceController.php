<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormAddRessourceController extends AbstractController
{
    #[Route('/ressource/add', name: 'formAddRessource')]
    public function index(): Response
    {
        $auth = $this->isGranted('ROLE_USER');
        return $this->render('ressource/form-add-ressource.html.twig', [
            'auth' => $auth,
        ]);
    }
}