<?php
namespace App\Entity;

use src\Repository\StatutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(name: 'id_statut', type: 'integer')]

    private $id_statut;

    public function getIdStatut()
    {
        return $this->id_statut;
    }

    public function setIdStatut($id_statut): self
    {
        $this->id_statut = $id_statut;
        return $this;
    }

    #[ORM\Column(name: "libelle_statut", type: 'string', length: 40)]
    private $libelle_statut;

    public function getLibelleStatut(): ?string
    {
        return $this->libelle_statut;
    }

    public function setLibelleStatut(string $libelle_statut): self
    {
        $this->libelle_statut = $libelle_statut;
        return $this;
    }


}