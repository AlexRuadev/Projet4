<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedicalRepository")
 */
class Medical
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Medical_regime;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Medical_traitement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Medical_allergie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Medical_handicap;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Medical_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Medical_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Medical_date_modif;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enfants", inversedBy="Enfants_medical", cascade={"persist", "remove"})
     */
    private $Medical_enfants;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicalRegime(): ?string
    {
        return $this->Medical_regime;
    }

    public function setMedicalRegime(?string $Medical_regime): self
    {
        $this->Medical_regime = $Medical_regime;

        return $this;
    }

    public function getMedicalTraitement(): ?string
    {
        return $this->Medical_traitement;
    }

    public function setMedicalTraitement(?string $Medical_traitement): self
    {
        $this->Medical_traitement = $Medical_traitement;

        return $this;
    }

    public function getMedicalAllergie(): ?string
    {
        return $this->Medical_allergie;
    }

    public function setMedicalAllergie(?string $Medical_allergie): self
    {
        $this->Medical_allergie = $Medical_allergie;

        return $this;
    }

    public function getMedicalHandicap(): ?string
    {
        return $this->Medical_handicap;
    }

    public function setMedicalHandicap(?string $Medical_handicap): self
    {
        $this->Medical_handicap = $Medical_handicap;

        return $this;
    }

    public function getMedicalStatus(): ?bool
    {
        return $this->Medical_status;
    }

    public function setMedicalStatus(bool $Medical_status): self
    {
        $this->Medical_status = $Medical_status;

        return $this;
    }

    public function getMedicalDateCreation(): ?\DateTimeInterface
    {
        return $this->Medical_date_creation;
    }

    public function setMedicalDateCreation(\DateTimeInterface $Medical_date_creation): self
    {
        $this->Medical_date_creation = $Medical_date_creation;

        return $this;
    }

    public function getMedicalDateModif(): ?\DateTimeInterface
    {
        return $this->Medical_date_modif;
    }

    public function setMedicalDateModif(?\DateTimeInterface $Medical_date_modif): self
    {
        $this->Medical_date_modif = $Medical_date_modif;

        return $this;
    }

    public function getMedicalEnfants(): ?Enfants
    {
        return $this->Medical_enfants;
    }

    public function setMedicalEnfants(?Enfants $Medical_enfants): self
    {
        $this->Medical_enfants = $Medical_enfants;

        return $this;
    }
}
