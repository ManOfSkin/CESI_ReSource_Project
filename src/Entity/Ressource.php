<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
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

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'ressources')]
    #[ORM\JoinColumn(nullable: false)]
    private $categorie;

    #[ORM\ManyToMany(targetEntity: TypeRelation::class, inversedBy: 'ressources')]
    #[ORM\JoinTable(name: 'Asso_Ressource_TypeRelation')]
    #[ORM\JoinColumn(name:'ressource_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name:'relation_id', referencedColumnName: 'id')]
    private $type_relation;

    #[ORM\OneToMany(mappedBy: 'ressource', targetEntity: Suivi::class)]
    private $suivi;

    #[ORM\OneToMany(mappedBy: 'ressource', targetEntity: Commenter::class)]
    private $commentaire;

    #[ORM\ManyToOne(targetEntity: Groupe::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $groupe;

    public function __construct()
    {   
        $this->date_creation = new \DateTime('now');
        $this->date_modification = new \DateTime('now');


        $this->type_relation = new ArrayCollection();
        $this->suivi = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
    }

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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|TypeRelation[]
     */
    public function getTypeRelation(): Collection
    {
        return $this->type_relation;
    }

    public function addTypeRelation(TypeRelation $typeRelation): self
    {
        if (!$this->type_relation->contains($typeRelation)) {
            $this->type_relation[] = $typeRelation;
        }

        return $this;
    }

    public function removeTypeRelation(TypeRelation $typeRelation): self
    {
        $this->type_relation->removeElement($typeRelation);

        return $this;
    }

    /**
     * @return Collection|Suivi[]
     */
    public function getSuivi(): Collection
    {
        return $this->suivi;
    }

    public function addSuivi(Suivi $suivi): self
    {
        if (!$this->suivi->contains($suivi)) {
            $this->suivi[] = $suivi;
            $suivi->setRessource($this);
        }

        return $this;
    }

    public function removeSuivi(Suivi $suivi): self
    {
        if ($this->suivi->removeElement($suivi)) {
            // set the owning side to null (unless already changed)
            if ($suivi->getRessource() === $this) {
                $suivi->setRessource(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commenter[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commenter $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setRessource($this);
        }

        return $this;
    }

    public function removeCommentaire(Commenter $commentaire): self
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getRessource() === $this) {
                $commentaire->setRessource(null);
            }
        }

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

}

