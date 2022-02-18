<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle_ressource;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre_article;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $article;

    #[ORM\Column(type: 'datetimetz')]
    private $date_creation;

    #[ORM\Column(type: 'datetimetz', nullable: true)]
    private $date_modification;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $citoyen_modification;

    #[ORM\Column(type: 'boolean')]
    private $validation_administrateur;

    #[ORM\Column(type: 'json', nullable: true)]
    private $attribut_media = [];

    #[ORM\ManyToOne(targetEntity: TypeRessource::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $type_ressource;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleRessource(): ?string
    {
        return $this->libelle_ressource;
    }

    public function setLibelleRessource(string $libelle_ressource): self
    {
        $this->libelle_ressource = $libelle_ressource;

        return $this;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titre_article;
    }

    public function setTitreArticle(string $titre_article): self
    {
        $this->titre_article = $titre_article;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(?string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->date_modification;
    }

    public function setDateModification(?\DateTimeInterface $date_modification): self
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    public function getCitoyenModification(): ?int
    {
        return $this->citoyen_modification;
    }

    public function setCitoyenModification(?int $citoyen_modification): self
    {
        $this->citoyen_modification = $citoyen_modification;

        return $this;
    }

    public function getValidationAdministrateur(): ?bool
    {
        return $this->validation_administrateur;
    }

    public function setValidationAdministrateur(bool $validation_administrateur): self
    {
        $this->validation_administrateur = $validation_administrateur;

        return $this;
    }

    public function getAttributMedia(): ?array
    {
        return $this->attribut_media;
    }

    public function setAttributMedia(?array $attribut_media): self
    {
        $this->attribut_media = $attribut_media;

        return $this;
    }

    public function getTypeRessource(): ?TypeRessource
    {
        return $this->type_ressource;
    }

    public function setTypeRessource(?TypeRessource $type_ressource): self
    {
        $this->type_ressource = $type_ressource;

        return $this;
    }

}

