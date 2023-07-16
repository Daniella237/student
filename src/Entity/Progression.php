<?php

namespace App\Entity;

use App\Repository\ProgressionRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ProgressionRepository::class)
 */
class Progression
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="progressions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enseignants;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="progressions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matieres;

    /**
     * @ORM\ManyToOne(targetEntity=Seance::class, inversedBy="progressions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seances;

    // /**
    //  * @ORM\Column(type="integer")
    //  *
    //  */
    // private $numberPrinted;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getEnseignants(): ?Enseignant
    {
        return $this->enseignants;
    }

    public function setEnseignants(?Enseignant $enseignants): self
    {
        $this->enseignants = $enseignants;

        return $this;
    }

    public function getMatieres(): ?Matiere
    {
        return $this->matieres;
    }

    public function setMatieres(?Matiere $matieres): self
    {
        $this->matieres = $matieres;

        return $this;
    }

    public function getSeances(): ?Seance
    {
        return $this->seances;
    }

    public function setSeances(?Seance $seances): self
    {
        $this->seances = $seances;

        return $this;
    }
}
