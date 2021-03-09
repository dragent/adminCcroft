<?php

namespace App\Entity;

use App\Repository\VipsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VipsRepository::class)
 */
class Vips
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudoVip;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfVip;

    /**
     * @ORM\Column(type="boolean")
     */
    private $superVip;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoVip(): ?string
    {
        return $this->pseudoVip;
    }

    public function setPseudoVip(string $pseudoVip): self
    {
        $this->pseudoVip = $pseudoVip;

        return $this;
    }

    public function getDateOfVip(): ?\DateTimeInterface
    {
        return $this->dateOfVip;
    }

    public function setDateOfVip(\DateTimeInterface $dateOfVip): self
    {
        $this->dateOfVip = $dateOfVip;

        return $this;
    }

    public function getSuperVip(): ?bool
    {
        return $this->superVip;
    }

    public function setSuperVip(bool $superVip): self
    {
        $this->superVip = $superVip;

        return $this;
    }
}
