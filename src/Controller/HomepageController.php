<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $auth = $this->isGranted('ROLE_USER');
        return $this->render('homepage.html.twig', [
            'auth' => $auth,
        ]);
    }
}