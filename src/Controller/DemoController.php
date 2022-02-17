<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/demo', name: 'demo')]
    public function index(): Response
    {
        $auth = $this->isGranted('ROLE_USER');
        return $this->render('base.html.twig',[
            'auth' => $auth,
        ]);
    }
}