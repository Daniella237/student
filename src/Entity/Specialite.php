<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialiteRepository::class)
 */
class Specialite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Filiere::class, inversedBy="specialites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $filieres;

    /**
     * @ORM\ManyToMany(targetEntity=Niveau::class, inversedBy="specialites")
     */
    private $appartient;

    /**
     * @ORM\ManyToMany(targetEntity=Matiere::class, inversedBy="specialites")
     */
    private $contient;

    public function __construct()
    {
        $this->appartient = new ArrayCollection();
        $this->contient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->libelle;
    }
    
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getFilieres(): ?Filiere
    {
        return $this->filieres;
    }

    public function setFilieres(?Filiere $filieres): self
    {
        $this->filieres = $filieres;

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getAppartient(): Collection
    {
        return $this->appartient;
    }

    public function addAppartient(Niveau $appartient): self
    {
        if (!$this->appartient->contains($appartient)) {
            $this->appartient[] = $appartient;
        }

        return $this;
    }

    public function removeAppartient(Niveau $appartient): self
    {
        $this->appartient->removeElement($appartient);

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getContient(): Collection
    {
        return $this->contient;
    }

    public function addContient(Matiere $contient): self
    {
        if (!$this->contient->contains($contient)) {
            $this->contient[] = $contient;
        }

        return $this;
    }

    public function removeContient(Matiere $contient): self
    {
        $this->contient->removeElement($contient);

        return $this;
    }
}
