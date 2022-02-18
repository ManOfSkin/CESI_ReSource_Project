<?php

namespace App\Entity;

use App\Repository\TypeRelationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRelationRepository::class)]
class TypeRelation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $libelle_type_relation;

    #[ORM\ManyToMany(targetEntity: Ressource::class, mappedBy: 'type_relation')]
    private $id_ressource;

    #[ORM\ManyToMany(targetEntity: Ressource::class, mappedBy: 'type_relation')]
    private $ressource;

    public function __construct()
    {
        $this->id_ressource = new ArrayCollection();
        $this->ressource = new ArrayCollection();
    }

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

    /**
     * @return Collection|Ressource[]
     */
    public function getIdRessource(): Collection
    {
        return $this->id_ressource;
    }

    public function addIdRessource(Ressource $idRessource): self
    {
        if (!$this->id_ressource->contains($idRessource)) {
            $this->id_ressource[] = $idRessource;
            $idRessource->addTypeRelation($this);
        }

        return $this;
    }

    public function removeIdRessource(Ressource $idRessource): self
    {
        if ($this->id_ressource->removeElement($idRessource)) {
            $idRessource->removeTypeRelation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Ressource[]
     */
    public function getRessource(): Collection
    {
        return $this->ressource;
    }

    public function addRessource(Ressource $ressource): self
    {
        if (!$this->ressource->contains($ressource)) {
            $this->ressource[] = $ressource;
            $ressource->addTypeRelation($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        if ($this->ressource->removeElement($ressource)) {
            $ressource->removeTypeRelation($this);
        }

        return $this;
    }
}
