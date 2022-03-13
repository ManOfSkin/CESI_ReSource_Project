<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

use App\Entity\Groupe;
use App\Entity\Ressource;
use App\Entity\Categorie;
use App\Entity\TypeRessource;
use App\Entity\Utilisateur;

use Doctrine\Common\Collections\ArrayCollection;
use PhpParser\Node\Expr\Array_;

class ShowRessourceController extends AbstractController
{
    #[Route('/ressource/show/{id}', name: 'showRessource')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auth = $this->isGranted('ROLE_USER');
        $em = $entityManager;
        $id = $request->get('id');

        $ressources = $em->getRepository(Ressource::class)->findOneBy(['id' => $request->get('id')]);

        $repositoryTypeRessource= $em->getRepository(TypeRessource::class);
        $repositoryCategorie = $em->getRepository(Categorie::class);
        $repositoryUtilisateur= $em->getRepository(Utilisateur::class);

        $typeRessources = $repositoryTypeRessource->findOneBy(['id' => $ressources->getTypeRessource()]);
        $categories = $repositoryCategorie->findOneBy(['id' => $ressources->getCategorie()]);
        $dateCreations = $ressources->getDateCreation()->format('d/m/Y');
        $utilisateurs = $repositoryUtilisateur->findOneBy(['id' => $ressources->getCitoyenModification()]);

        $json = $ressources->getAttributMedia();

        $nom = NULL;
        $mime =NULL;
        $poids = NULL;
        $extension = NULL;
        $emplacement = NULL;
        $url = NULL;

        if ($typeRessources == 'Activité / Jeu à réaliser' || $typeRessources == 'Exercice / Atelier' || $typeRessources == 'Cours au format PDF'|| $typeRessources == 'Fiche de lecture' || $typeRessources == 'Carte défi'){
            $nom = $json["nom"];
            $mime = $json["MIME"];
            $poids = $json["poids"];
            $extension = $json["extension"];
            $emplacement = $json["emplacement"];
        } elseif ($typeRessources == 'Article' || $typeRessources == 'Jeu en ligne' || $typeRessources == 'Vidéo'){
            $url = $json["lien"];
        }


        return $this->render('ressource/show-ressource.html.twig', [
            'auth' => $auth,
            'ressources' => $ressources,
            'typeRessources' => $typeRessources,
            'categories' => $categories,
            'dateCreations' => $dateCreations,
            'utilisateurs' => $utilisateurs,
            'nom' =>$nom,
            'mime' =>$mime,
            'poids' =>$poids,
            'extension' =>$extension,
            'emplacement' =>$emplacement,
            'url' =>$url
        ]);
    }
}