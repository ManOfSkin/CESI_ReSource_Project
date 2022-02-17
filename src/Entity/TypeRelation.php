<?php

namespace App\Entity;

use App\Repository\TypeRelationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRelationRepository::class)]
class TypeRelation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_type_relation',type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $libelle_type_relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeRelation(): ?string
    {
        return $this->libelle_type_relation;
    }

    public function setLibelleTypeRelation(string $libelle_type_relation): self
    {
        $this->libelle_type_relation = $libelle_type_relation;

        return $this;
    }
}
