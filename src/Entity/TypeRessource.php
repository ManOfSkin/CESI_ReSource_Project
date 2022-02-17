<?php

namespace App\Entity;

use App\Repository\TypeRessourceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRessourceRepository::class)]
class TypeRessource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_type_ressource', type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $libelle_type_ressource;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeRessource(): ?string
    {
        return $this->libelle_type_ressource;
    }

    public function setLibelleTypeRessource(string $libelle_type_ressource): self
    {
        $this->libelle_type_ressource = $libelle_type_ressource;

        return $this;
    }
}
