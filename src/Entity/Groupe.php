<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_groupe',type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $libelle_groupe;

    #[ORM\Column(type: 'text')]
    private $type_groupe;

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
}
