<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Form\RessourceType;
use App\Entity\Ressource;

class FormAddRessourceController extends AbstractController
{
    #[Route('/ressource/add', name: 'formAddRessource')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserInterface $user): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        
        $auth = $this->isGranted('ROLE_USER');

        $ressource = new Ressource();
        $form = $this->createForm(RessourceType::class, $ressource);
        $form->handleRequest($request);

        if ($form->get('ajouter')->isClicked()){
            if ($form->isSubmitted() && $form->isValid()){

                $ressource->setValidationAdministrateur(true);
                $ressource->setCitoyenModification($user->getId());

                $groupe = $entityManager->getRepository(Groupe::class)->findOneBy(['id' => '1']);
                $ressource->setGroupe($groupe);

                if ($form['type_ressource']->getData() == "Cours au format PDF"){
                    $file = $form['filePDF']->getData();
                    $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileWeight = filesize($file);
                    $extension = strtolower($file->guessExtension());
    
                    if ($extension === 'pdf'){
                        $mime = 'application/pdf';
                    }
                } elseif (($form['type_ressource']->getData() == "Activité / Jeu à réaliser") || ($form['type_ressource']->getData() == "Exercice / Atelier") || ($form['type_ressource']->getData() == "Fiche de lecture")){
                    $file = $form['fileFichier']->getData();
                    $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileWeight = filesize($file);
                    $extension = strtolower($file->guessExtension());
    
                    if ($extension === 'pdf'){
                        $mime = 'application/pdf';
                    } elseif ($extension === 'docx'){
                        $mime = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
                    } elseif ($extension === 'doc'){
                        $mime = 'application/msword';
                    } elseif ($extension === 'odt'){
                        $mime = 'application/vnd.oasis.opendocument.text';
                    } elseif ($extension === 'xlsx'){
                        $mime = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                    } elseif ($extension === 'xls'){
                        $mime = 'application/vnd.ms-excel';
                    } elseif ($extension === 'ods'){
                        $mime = 'application/vnd.oasis.opendocument.spreadsheet';
                    }
                } elseif ($form['type_ressource']->getData() == "Carte défi"){
                    $file = $form['fileImg']->getData();
                    $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileWeight = filesize($file);
                    $extension = strtolower($file->guessExtension());
    
                    if ($extension === 'png'){
                        $mime = 'image/png';
                    } elseif ($extension === 'jpeg' || $extension === 'jpg'){
                        $mime = 'image/jpeg';
                    } elseif ($extension === 'bmp'){
                        $mime = 'image/bmp';
                    }
                } elseif (($form['type_ressource']->getData() == "Article") || ($form['type_ressource']->getData() == "Jeu en ligne") || ($form['type_ressource']->getData() == "Vidéo")){
                    $url = $form['lien']->getData();

                    $attribut_media = array("lien" => $url);
                    $ressource->setAttributMedia($attribut_media);
                } else {
                    $attribut_media = array("test" => 'test');
                    $ressource->setAttributMedia($attribut_media);
                }

                $entityManager->persist($ressource);
                $entityManager->flush();
                
                if (($form['type_ressource']->getData() == "Cours au format PDF") || ($form['type_ressource']->getData() == "Activité / Jeu à réaliser") || ($form['type_ressource']->getData() == "Exercice / Atelier") || ($form['type_ressource']->getData() == "Fiche de lecture") || ($form['type_ressource']->getData() == "Carte défi")){
                    $id = $ressource->getId();
                    
                    $target_dir = "C:/wamp64/www/Projet_Cube_1/public/GED/".$id."/";
        
                    $file->move($target_dir, $file_name.'.'.$extension);
    
                    $attribut_media = array("nom" => $file_name, "poids" => $fileWeight, "extension" => $extension, "MIME" => $mime, "emplacement" => $target_dir.$file_name.'.'.$extension);
                    $ressource->setAttributMedia($attribut_media);
                    
                    $entityManager->persist($ressource);
                    $entityManager->flush();
                } 


                return $this->redirect($this->generateUrl('ressource'));
            }
        } elseif ($form->get('annuler')->isClicked()){
            return $this->redirect($this->generateUrl('ressource'));
        }

        return $this->render('ressource/form-add-ressource.html.twig', [
            'auth' => $auth,
            'form' => $form->createView()
        ]);
    }
}