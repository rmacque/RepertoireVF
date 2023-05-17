<?php

namespace App\Entity;

use App\Repository\ComedienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComedienRepository::class)]
class Comedien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?bool $DA = null;

    #[ORM\ManyToMany(targetEntity: Oeuvre::class, mappedBy: 'listDa')]
    private Collection $directionsArtistiques;

    #[ORM\OneToMany(mappedBy: 'comedien', targetEntity: Jouer::class)]
    private Collection $roles;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    public function __construct()
    {
        $this->directionsArtistiques = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function isDA(): ?bool
    {
        return $this->DA;
    }

    public function setDA(bool $DA): self
    {
        $this->DA = $DA;

        return $this;
    }

    /**
     * @return Collection<int, Oeuvre>
     */
    public function getDirectionsArtistiques(): Collection
    {
        return $this->directionsArtistiques;
    }

    public function addDirectionsArtistique(Oeuvre $directionsArtistique): self
    {
        if (!$this->directionsArtistiques->contains($directionsArtistique)) {
            $this->directionsArtistiques->add($directionsArtistique);
            $directionsArtistique->addListDa($this);
        }

        return $this;
    }

    public function removeDirectionsArtistique(Oeuvre $directionsArtistique): self
    {
        if ($this->directionsArtistiques->removeElement($directionsArtistique)) {
            $directionsArtistique->removeListDa($this);
        }

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
            $role->setComedien($this);
        }

        return $this;
    }

    public function removeRole(Jouer $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getComedien() === $this) {
                $role->setComedien(null);
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
