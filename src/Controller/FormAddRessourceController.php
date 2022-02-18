<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RessourceType;
use App\Entity\Ressource;


class FormAddRessourceController extends AbstractController
{
    #[Route('/ressource/add', name: 'formAddRessource')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auth = $this->isGranted('ROLE_USER');

        $ressource = new Ressource();
        $form = $this->createForm(RessourceType::class, $ressource);

        $form->handleRequest($request);
        if ($form->get('ajouter')->isClicked()){
            if ($form->isSubmitted() && $form->isValid()){
                $entityManager->persist($ressource);
                $entityManager->flush();
            }
        } elseif ($form->get('annuler')->isClicked()){

        }

        return $this->render('ressource/form-add-ressource.html.twig', [
            'auth' => $auth,
            'form' => $form->createView()
        ]);
    }
}