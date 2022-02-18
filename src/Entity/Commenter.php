<?php

namespace App\Entity;

use App\Repository\CommenterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommenterRepository::class)]
class Commenter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'commentaire')]
    #[ORM\JoinColumn(nullable: false)]
    private $utilisateur;

    #[ORM\ManyToOne(targetEntity: Ressource::class, inversedBy: 'commentaire')]
    #[ORM\JoinColumn(nullable: false)]
    private $ressource;

    #[ORM\OneToOne(targetEntity: Commentaire::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(referencedColumnName: 'id', nullable: false)]
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getRessource(): ?Ressource
    {
        return $this->ressource;
    }

    public function setRessource(?Ressource $ressource): self
    {
        $this->ressource = $ressource;

        return $this;
    }

    public function getCommentaire(): ?Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(Commentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
