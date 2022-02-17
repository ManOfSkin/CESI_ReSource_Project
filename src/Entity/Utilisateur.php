<?php
namespace App\Entity;

use src\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id, ORM\GeneratedValue()]
    #[ORM\Column(name: 'Id_user', type: 'integer')]
    #[ORM\OneToOne(mappedBy:"id_statut", targetEntity:"src\Entity\Statut")]
    #[ORM\JoinColumn(name:"id_user", referencedColumnName:"id_statut" )]

    private $id_user;

    public function getIdUser(): ?string
    {
        return $this->id_user;
    }

    public function setIdUser($id_user): self
    {
        $this->id_user = $id_user;
        return $this;
    }

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->city = $nom;

        return $this;
    }


    #[ORM\Column(type: 'string', length: 50)]
    private $prenom;

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    #[ORM\Column(type: 'string', length: 50)]
    private $mail;

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail($mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    #[ORM\Column(type: 'string', length: 40)]
    private $mdp;

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp($mdp): self
    {
        $this->mdp = $mdp;
        return $this;
    }

}