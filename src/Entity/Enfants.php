<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnfantsRepository")
 */
class Enfants
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Enfants_prenom;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Enfants_nom;

    /**
     * @ORM\Column(type="date")
     */
    private $Enfants_date_de_naissance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Enfants_information;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Enfants_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Enfants_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Enfants_date_modif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="Parents_enfants")
     */
    private $Enfants_parents;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Medical", mappedBy="Medical_enfants", cascade={"persist", "remove"})
     */
    private $Enfants_medical;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bracelet", mappedBy="Bracelet_enfants", cascade={"persist", "remove"})
     */
    private $Enfants_Bracelet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnfantsPrenom(): ?string
    {
        return $this->Enfants_prenom;
    }

    public function setEnfantsPrenom(string $Enfants_prenom): self
    {
        $this->Enfants_prenom = $Enfants_prenom;

        return $this;
    }

    public function getEnfantsNom(): ?string
    {
        return $this->Enfants_nom;
    }

    public function setEnfantsNom(string $Enfants_nom): self
    {
        $this->Enfants_nom = $Enfants_nom;

        return $this;
    }

    public function getEnfantsDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->Enfants_date_de_naissance;
    }

    public function setEnfantsDateDeNaissance(\DateTimeInterface $Enfants_date_de_naissance): self
    {
        $this->Enfants_date_de_naissance = $Enfants_date_de_naissance;

        return $this;
    }

    public function getEnfantsInformation(): ?string
    {
        return $this->Enfants_information;
    }

    public function setEnfantsInformation(?string $Enfants_information): self
    {
        $this->Enfants_information = $Enfants_information;

        return $this;
    }

    public function getEnfantsStatus(): ?bool
    {
        return $this->Enfants_status;
    }

    public function setEnfantsStatus(bool $Enfants_status): self
    {
        $this->Enfants_status = $Enfants_status;

        return $this;
    }

    public function getEnfantsDateCreation(): ?\DateTimeInterface
    {
        return $this->Enfants_date_creation;
    }

    public function setEnfantsDateCreation(\DateTimeInterface $Enfants_date_creation): self
    {
        $this->Enfants_date_creation = $Enfants_date_creation;

        return $this;
    }

    public function getEnfantsDateModif(): ?\DateTimeInterface
    {
        return $this->Enfants_date_modif;
    }

    public function setEnfantsDateModif(?\DateTimeInterface $Enfants_date_modif): self
    {
        $this->Enfants_date_modif = $Enfants_date_modif;

        return $this;
    }

    public function getEnfantsParents(): ?Parents
    {
        return $this->Enfants_parents;
    }

    public function setEnfantsParents(?Parents $Enfants_parents): self
    {
        $this->Enfants_parents = $Enfants_parents;

        return $this;
    }

    public function getEnfantsMedical(): ?Medical
    {
        return $this->Enfants_medical;
    }

    public function setEnfantsMedical(?Medical $Enfants_medical): self
    {
        $this->Enfants_medical = $Enfants_medical;

        // set (or unset) the owning side of the relation if necessary
        $newMedical_enfants = $Enfants_medical === null ? null : $this;
        if ($newMedical_enfants !== $Enfants_medical->getMedicalEnfants()) {
            $Enfants_medical->setMedicalEnfants($newMedical_enfants);
        }

        return $this;
    }

    public function getEnfantsBracelet(): ?Bracelet
    {
        return $this->Enfants_Bracelet;
    }

    public function setEnfantsBracelet(Bracelet $Enfants_Bracelet): self
    {
        $this->Enfants_Bracelet = $Enfants_Bracelet;

        // set the owning side of the relation if necessary
        if ($this !== $Enfants_Bracelet->getBraceletEnfants()) {
            $Enfants_Bracelet->setBraceletEnfants($this);
        }

        return $this;
    }

    public function __toString()
    {
        return  $this->Enfants_nom. ' ['.strval($this->id) . '] ';
    }
}
