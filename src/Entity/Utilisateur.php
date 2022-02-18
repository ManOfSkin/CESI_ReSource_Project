<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\ManyToOne(targetEntity: Statut::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $statut;

    #[ORM\ManyToMany(targetEntity: Ressource::class, inversedBy: 'utilisateur')]
    #[ORM\JoinTable(name: "creation_user_ressource"), ORM\JoinColumn(name:"user_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: 'ressource_id', referencedColumnName: 'id')]
    private $ressource;

    #[ORM\ManyToMany(targetEntity: Ressource::class, inversedBy: 'suivi_utilisateur')]
    #[ORM\JoinTable(name: "suivi_user_ressource"), ORM\JoinColumn(name:"user_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: 'ressource_id', referencedColumnName: 'id')]
    private $suivi_ressource;

    #[ORM\ManyToMany(targetEntity: Groupe::class, inversedBy: 'utilisateur')]
    #[ORM\JoinTable(name: "user_groupe"), ORM\JoinColumn(name:"user_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: 'groupe_id', referencedColumnName: 'id')]
    private $groupe;

    #[ORM\ManyToMany(targetEntity: Commentaire::class)]
    #[ORM\JoinTable(name: "user_commentaire"), ORM\JoinColumn(name:"user_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: 'commentaire_id', referencedColumnName: 'id')]
    private $commentaire;



    public function __construct()
    {
        $this->ressource = new ArrayCollection();
        $this->groupe = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->suivi_ressource = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

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
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        $this->ressource->removeElement($ressource);

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupe(): Collection
    {
        return $this->groupe;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupe->contains($groupe)) {
            $this->groupe[] = $groupe;
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        $this->groupe->removeElement($groupe);

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        $this->commentaire->removeElement($commentaire);

        return $this;
    }

    /**
     * @return Collection|Ressource[]
     */
    public function getSuiviRessource(): Collection
    {
        return $this->suivi_ressource;
    }

    public function addSuiviRessource(Ressource $suiviRessource): self
    {
        if (!$this->suivi_ressource->contains($suiviRessource)) {
            $this->suivi_ressource[] = $suiviRessource;
        }

        return $this;
    }

    public function removeSuiviRessource(Ressource $suiviRessource): self
    {
        $this->suivi_ressource->removeElement($suiviRessource);

        return $this;
    }
}
