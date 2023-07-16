<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $quota;

    /**
     * @ORM\OneToMany(targetEntity=Progression::class, mappedBy="matieres")
     */
    private $progressions;

    /**
     * @ORM\ManyToMany(targetEntity=Niveau::class, mappedBy="encadre")
     */
    private $niveaux;

    /**
     * @ORM\ManyToMany(targetEntity=Specialite::class, mappedBy="contient")
     */
    private $specialites;

    /**
     * @ORM\ManyToMany(targetEntity=Enseignant::class, inversedBy="matieres")
     */
    private $dispense;

    public function __construct()
    {
        $this->progressions = new ArrayCollection();
        $this->niveaux = new ArrayCollection();
        $this->specialites = new ArrayCollection();
        $this->dispense = new ArrayCollection();
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

    public function getQuota(): ?int
    {
        return $this->quota;
    }

    public function setQuota(int $quota): self
    {
        $this->quota = $quota;

        return $this;
    }

    /**
     * @return Collection|Progression[]
     */
    public function getProgressions(): Collection
    {
        return $this->progressions;
    }

    public function addProgression(Progression $progression): self
    {
        if (!$this->progressions->contains($progression)) {
            $this->progressions[] = $progression;
            $progression->setMatieres($this);
        }

        return $this;
    }

    public function removeProgression(Progression $progression): self
    {
        if ($this->progressions->removeElement($progression)) {
            // set the owning side to null (unless already changed)
            if ($progression->getMatieres() === $this) {
                $progression->setMatieres(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->addEncadre($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            $niveau->removeEncadre($this);
        }

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
            $specialite->addContient($this);
        }

        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->specialites->removeElement($specialite)) {
            $specialite->removeContient($this);
        }

        return $this;
    }

    /**
     * @return Collection|Enseignant[]
     */
    public function getDispense(): Collection
    {
        return $this->dispense;
    }

    public function addDispense(Enseignant $dispense): self
    {
        if (!$this->dispense->contains($dispense)) {
            $this->dispense[] = $dispense;
        }

        return $this;
    }

    public function removeDispense(Enseignant $dispense): self
    {
        $this->dispense->removeElement($dispense);

        return $this;
    }

    
}
