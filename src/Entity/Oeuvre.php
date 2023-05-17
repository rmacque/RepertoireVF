<?php

namespace App\Entity;

use App\Repository\OeuvreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OeuvreRepository::class)]
class Oeuvre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $parution = null;

    #[ORM\ManyToOne(inversedBy: 'listOeuvres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\ManyToMany(targetEntity: Comedien::class, inversedBy: 'directionsArtistiques')]
    private Collection $listDa;

    #[ORM\OneToMany(mappedBy: 'oeuvre', targetEntity: Jouer::class)]
    private Collection $roles;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    public function __construct()
    {
        $this->listDa = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getParution(): ?\DateTimeInterface
    {
        return $this->parution;
    }

    public function setParution(\DateTimeInterface $parution): self
    {
        $this->parution = $parution;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Comedien>
     */
    public function getListDa(): Collection
    {
        return $this->listDa;
    }

    public function addListDa(Comedien $listDa): self
    {
        if (!$this->listDa->contains($listDa)) {
            $this->listDa->add($listDa);
        }

        return $this;
    }

    public function removeListDa(Comedien $listDa): self
    {
        $this->listDa->removeElement($listDa);

        return $this;
    }

    /**
     * @return Collection<int, Jouer>
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Jouer $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
            $role->setOeuvre($this);
        }

        return $this;
    }

    public function removeRole(Jouer $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getOeuvre() === $this) {
                $role->setOeuvre(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
