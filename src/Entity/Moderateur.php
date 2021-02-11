<?php

namespace App\Entity;

use App\Repository\ModerateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ModerateurRepository::class)
 * @Orm\Table(name="`Moderateur`")
 */
class Moderateur implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true)
     */
    private $idModerateur;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudoModerateur;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="boolean")
     */
    private $superModo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $linkIsUsed;


    public function getIdModerateur(): ?string
    {
        return $this->idModerateur;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->idModerateur;
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
     * @see UserInterface
     */
    public function getPassword()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed for apps that do not check user passwords
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudoModerateur(): ?string
    {
        return $this->pseudoModerateur;
    }

    public function setPseudoModerateur(string $pseudoModerateur): self
    {
        $this->pseudoModerateur = $pseudoModerateur;

        return $this;
    }

    public function getEmail(): ?array 
    {
        $email=explode('@',$this->email);
        return $email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getSuperModo(): ?bool
    {
        return $this->superModo;
    }

    public function setSuperModo(bool $superModo): self
    {
        $this->superModo = $superModo;

        return $this;
    }

    public function getLinkIsUsed(): ?bool
    {
        return $this->linkIsUsed;
    }

    public function setLinkIsUsed(bool $linkIsUsed): self
    {
        $this->linkIsUsed = $linkIsUsed;

        return $this;
    }
}
