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
        return $this->render('form-add-ressource.html.twig');
    }
}