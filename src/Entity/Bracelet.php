<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BraceletRepository")
 */
class Bracelet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Bracelet_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Bracelet_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Bracelet_date_modif;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enfants", inversedBy="Enfants_Bracelet", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bracelet_enfants;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprises", inversedBy="Entreprises_Bracelet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bracelet_entreprises;

    public function __construct()
    {
        $this->Bracelet_date_creation = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $this->Bracelet_date_modif = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBraceletStatus(): ?bool
    {
        return $this->Bracelet_status;
    }

    public function setBraceletStatus(bool $Bracelet_status): self
    {
        $this->Bracelet_status = $Bracelet_status;

        return $this;
    }

    public function getBraceletDateCreation(): ?\DateTimeInterface
    {
        return $this->Bracelet_date_creation;
    }

    public function setBraceletDateCreation(\DateTimeInterface $Bracelet_date_creation): self
    {
        $this->Bracelet_date_creation = $Bracelet_date_creation;

        return $this;
    }

    public function getBraceletDateModif(): ?\DateTimeInterface
    {
        return $this->Bracelet_date_modif;
    }

    public function setBraceletDateModif(?\DateTimeInterface $Bracelet_date_modif): self
    {
        $this->Bracelet_date_modif = $Bracelet_date_modif;

        return $this;
    }

    public function getBraceletEnfants(): ?Enfants
    {
        return $this->Bracelet_enfants;
    }

    public function setBraceletEnfants(Enfants $Bracelet_enfants): self
    {
        $this->Bracelet_enfants = $Bracelet_enfants;

        return $this;
    }

    public function getBraceletEntreprises(): ?Entreprises
    {
        return $this->Bracelet_entreprises;
    }

    public function setBraceletEntreprises(?Entreprises $Bracelet_entreprises): self
    {
        $this->Bracelet_entreprises = $Bracelet_entreprises;

        return $this;
    }
    public function __toString()
    {
        return  strval($this->id);
    }

}
