<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Oeuvre::class)]
    private Collection $listOeuvres;

    public function __construct()
    {
        $this->listOeuvres = new ArrayCollection();
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

    /**
     * @return Collection<int, Oeuvre>
     */
    public function getListOeuvres(): Collection
    {
        return $this->listOeuvres;
    }

    public function addListOeuvre(Oeuvre $listOeuvre): self
    {
        if (!$this->listOeuvres->contains($listOeuvre)) {
            $this->listOeuvres->add($listOeuvre);
            $listOeuvre->setCategorie($this);
        }

        return $this;
    }

    public function removeListOeuvre(Oeuvre $listOeuvre): self
    {
        if ($this->listOeuvres->removeElement($listOeuvre)) {
            // set the owning side to null (unless already changed)
            if ($listOeuvre->getCategorie() === $this) {
                $listOeuvre->setCategorie(null);
            }
        }

        return $this;
    }
}
