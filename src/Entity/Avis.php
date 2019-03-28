<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Avis_note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Avis_commentaires;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Avis_signalement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Avis_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Avis_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Avis_date_modif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="Parents_Avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Avis_parents;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprises", inversedBy="Entreprises_Avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Avis_entreprises;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvisNote(): ?int
    {
        return $this->Avis_note;
    }

    public function setAvisNote(?int $Avis_note): self
    {
        $this->Avis_note = $Avis_note;

        return $this;
    }

    public function getAvisCommentaires(): ?string
    {
        return $this->Avis_commentaires;
    }

    public function setAvisCommentaires(?string $Avis_commentaires): self
    {
        $this->Avis_commentaires = $Avis_commentaires;

        return $this;
    }

    public function getAvisSignalement(): ?int
    {
        return $this->Avis_signalement;
    }

    public function setAvisSignalement(?int $Avis_signalement): self
    {
        $this->Avis_signalement = $Avis_signalement;

        return $this;
    }

    public function getAvisStatus(): ?bool
    {
        return $this->Avis_status;
    }

    public function setAvisStatus(bool $Avis_status): self
    {
        $this->Avis_status = $Avis_status;

        return $this;
    }

    public function getAvisDateCreation(): ?\DateTimeInterface
    {
        return $this->Avis_date_creation;
    }

    public function setAvisDateCreation(\DateTimeInterface $Avis_date_creation): self
    {
        $this->Avis_date_creation = $Avis_date_creation;

        return $this;
    }

    public function getAvisDateModif(): ?\DateTimeInterface
    {
        return $this->Avis_date_modif;
    }

    public function setAvisDateModif(?\DateTimeInterface $Avis_date_modif): self
    {
        $this->Avis_date_modif = $Avis_date_modif;

        return $this;
    }

    public function getAvisParents(): ?Parents
    {
        return $this->Avis_parents;
    }

    public function setAvisParents(?Parents $Avis_parents): self
    {
        $this->Avis_parents = $Avis_parents;

        return $this;
    }

    public function getAvisEntreprises(): ?Entreprises
    {
        return $this->Avis_entreprises;
    }

    public function setAvisEntreprises(?Entreprises $Avis_entreprises): self
    {
        $this->Avis_entreprises = $Avis_entreprises;

        return $this;
    }
}
