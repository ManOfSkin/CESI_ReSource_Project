<?php

namespace App\Controller;

use App\Entity\Statut;
use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // 1. Encode le mot de passe
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // 2. Recherche du statut "Actif" par son libellé ou son ID
            $statutRepository = $entityManager->getRepository(Statut::class);
            $statut = $statutRepository->findOneBy(['libelle' => 'Actif']) 
                   ?? $statutRepository->find(1);

            // 3. Filet de sécurité ultime : si le statut n'existe toujours pas, on le crée dynamiquement
            if (!$statut) {
                $statut = new Statut();
                $statut->setLibelle('Actif');
                $entityManager->persist($statut);
            }

            // 4. On assigne le statut à l'utilisateur
            $user->setStatut($statut);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'auth' => 0
        ]);
    }
}