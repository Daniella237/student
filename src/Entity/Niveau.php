<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Matiere::class, inversedBy="niveaux")
     */
    private $encadre;

    /**
     * @ORM\ManyToMany(targetEntity=Specialite::class, mappedBy="appartient")
     */
    private $specialites;

    public function __construct()
    {
        $this->encadre = new ArrayCollection();
        $this->specialites = new ArrayCollection();
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

    /**
     * @return Collection|Matiere[]
     */
    public function getEncadre(): Collection
    {
        return $this->encadre;
    }

    public function addEncadre(Matiere $encadre): self
    {
        if (!$this->encadre->contains($encadre)) {
            $this->encadre[] = $encadre;
        }

        return $this;
    }

    public function removeEncadre(Matiere $encadre): self
    {
        $this->encadre->removeElement($encadre);

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpecialites(): Collection
    {
        return $this->specialites;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->specialites->contains($specialite)) {
            $this->specialites[] = $specialite;
            $specialite->addAppartient($this);
        }

        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->specialites->removeElement($specialite)) {
            $specialite->removeAppartient($this);
        }

        return $this;
    }
}
