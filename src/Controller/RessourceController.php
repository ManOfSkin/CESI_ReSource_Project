<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Ressource;
use App\Entity\TypeRessource;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ShowType;


class RessourceController extends AbstractController
{
    private $em;
    #[Route('/ressource', name: 'ressource')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auth = $this->isGranted('ROLE_USER');
        $em = $entityManager;
        $ressources = $entityManager->getRepository(Ressource::class)->findAll();
        $repositoryUtilisateur= $em->getRepository(Utilisateur::class);
        $repositoryTypeRessource= $em->getRepository(TypeRessource::class);
        $repositoryCategorie = $em->getRepository(Categorie::class);
        $utilisateurs = [];
        $typeRessources = [];
        $dateCreations = [];
        $categories = [];
        foreach ($ressources as $ressource) {
            $ressource->getCitoyenModification();
            $utilisateurs[] = $repositoryUtilisateur->findOneBy(['id' => $ressource->getCitoyenModification()]);
            $typeRessources[] = $repositoryTypeRessource->findOneBy(['id' => $ressource->getTypeRessource()]);
            $dateCreations[] = $ressource->getDateCreation()->format('d/m/Y');
            $categories[] = $repositoryCategorie->findOneBy(['id' => $ressource->getCategorie()]);
        }

       /*  $form = $this->createForm(ShowType::class);
        $form->handleRequest($request);

        if ($form->get('voir')->isClicked()){
            if ($form->isSubmitted() && $form->isValid()){
         
            }
        } */

        return $this->render('ressource/ressource.html.twig', [
            'auth' => $auth,
            'ressources' => $ressources,
            'utilisateurs' => $utilisateurs,
            'typeRessources' => $typeRessources,
            'dateCreations' => $dateCreations,
            'categories' => $categories,
            /* 'form' => $form->createView() */
        ]);
    }
}
