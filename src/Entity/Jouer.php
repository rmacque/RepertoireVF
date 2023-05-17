<?php

namespace App\Entity;

use App\Repository\JouerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JouerRepository::class)]
class Jouer
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'roles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Oeuvre $oeuvre = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'roles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comedien $comedien = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column]
    private ?bool $VF = null;

    #[ORM\Column]
    private ?bool $VO = null;

    public function getOeuvre(): ?Oeuvre
    {
        return $this->oeuvre;
    }

    public function setOeuvre(?Oeuvre $oeuvre): self
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }

    public function getComedien(): ?Comedien
    {
        return $this->comedien;
    }

    public function setComedien(?Comedien $comedien): self
    {
        $this->comedien = $comedien;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function isVF(): ?bool
    {
        return $this->VF;
    }

    public function setVF(bool $VF): self
    {
        $this->VF = $VF;

        return $this;
    }

    public function isVO(): ?bool
    {
        return $this->VO;
    }

    public function setVO(bool $VO): self
    {
        $this->VO = $VO;

        return $this;
    }
}
