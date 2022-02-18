<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id',type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $libelle_groupe;

    #[ORM\Column(type: 'text')]
    private $type_groupe;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'groupe')]
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleGroupe(): ?string
    {
        return $this->libelle_groupe;
    }

    public function setLibelleGroupe(string $libelle_groupe): self
    {
        $this->libelle_groupe = $libelle_groupe;

        return $this;
    }

    public function getTypeGroupe(): ?string
    {
        return $this->type_groupe;
    }

    public function setTypeGroupe(string $type_groupe): self
    {
        $this->type_groupe = $type_groupe;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur[] = $utilisateur;
            $utilisateur->addGroupe($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateur->removeElement($utilisateur)) {
            $utilisateur->removeGroupe($this);
        }

        return $this;
    }
}
