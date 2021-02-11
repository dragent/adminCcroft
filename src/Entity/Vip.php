<?php

namespace App\Entity;

use App\Repository\VipRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VipRepository::class)
 */
class Vip
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
     * @ORM\Column(type="integer")
     */
    private $superVip;

    /**
     * @ORM\Column(type="date")
     */
    private $dateofVip;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

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

    public function getSuperVip(): ?int
    {
        return $this->superVip;
    }

    public function setSuperVip(int $superVip): self
    {
        $this->superVip = $superVip;

        return $this;
    }

    public function getDateofVip(): ?\DateTimeInterface
    {
        return $this->dateofVip;
    }

    public function setDateofVip(\DateTimeInterface $dateofVip): self
    {
        $this->dateofVip = $dateofVip;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
