<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $favoris;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $lu;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $liste_de_lecture;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'suivi')]
    #[ORM\JoinColumn(nullable: false)]
    private $utilisateur;

    #[ORM\ManyToOne(targetEntity: Ressource::class, inversedBy: 'suivi')]
    #[ORM\JoinColumn(nullable: false)]
    private $ressource;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFavoris(): ?bool
    {
        return $this->favoris;
    }

    public function setFavoris(?bool $favoris): self
    {
        $this->favoris = $favoris;

        return $this;
    }

    public function getLu(): ?bool
    {
        return $this->lu;
    }

    public function setLu(bool $lu): self
    {
        $this->lu = $lu;

        return $this;
    }

    public function getListeDeLecture(): ?bool
    {
        return $this->liste_de_lecture;
    }

    public function setListeDeLecture(?bool $liste_de_lecture): self
    {
        $this->liste_de_lecture = $liste_de_lecture;

        return $this;
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
}
