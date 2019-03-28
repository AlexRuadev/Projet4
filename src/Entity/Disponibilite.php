<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DisponibiliteRepository")
 */
class Disponibilite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Disponibilite_jour;

    /**
     * @ORM\Column(type="integer")
     */
    private $Disponibilite_nbEnfant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponibilite_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Disponibilite_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Disponibilite_date_modif;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Reservations", inversedBy="Reservations")
     */
    private $Disponibilite_reservation;

    public function __construct()
    {
        $this->Disponibilite_reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisponibiliteJour(): ?\DateTimeInterface
    {
        return $this->Disponibilite_jour;
    }

    public function setDisponibiliteJour(\DateTimeInterface $Disponibilite_jour): self
    {
        $this->Disponibilite_jour = $Disponibilite_jour;

        return $this;
    }

    public function getDisponibiliteNbEnfant(): ?int
    {
        return $this->Disponibilite_nbEnfant;
    }

    public function setDisponibiliteNbEnfant(int $Disponibilite_nbEnfant): self
    {
        $this->Disponibilite_nbEnfant = $Disponibilite_nbEnfant;

        return $this;
    }

    public function getDisponibiliteStatus(): ?bool
    {
        return $this->Disponibilite_status;
    }

    public function setDisponibiliteStatus(bool $Disponibilite_status): self
    {
        $this->Disponibilite_status = $Disponibilite_status;

        return $this;
    }

    public function getDisponibiliteDateCreation(): ?\DateTimeInterface
    {
        return $this->Disponibilite_date_creation;
    }

    public function setDisponibiliteDateCreation(\DateTimeInterface $Disponibilite_date_creation): self
    {
        $this->Disponibilite_date_creation = $Disponibilite_date_creation;

        return $this;
    }

    public function getDisponibiliteDateModif(): ?\DateTimeInterface
    {
        return $this->Disponibilite_date_modif;
    }

    public function setDisponibiliteDateModif(?\DateTimeInterface $Disponibilite_date_modif): self
    {
        $this->Disponibilite_date_modif = $Disponibilite_date_modif;

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getDisponibiliteReservation(): Collection
    {
        return $this->Disponibilite_reservation;
    }

    public function addDisponibiliteReservation(Reservations $disponibiliteReservation): self
    {
        if (!$this->Disponibilite_reservation->contains($disponibiliteReservation)) {
            $this->Disponibilite_reservation[] = $disponibiliteReservation;
        }

        return $this;
    }

    public function removeDisponibiliteReservation(Reservations $disponibiliteReservation): self
    {
        if ($this->Disponibilite_reservation->contains($disponibiliteReservation)) {
            $this->Disponibilite_reservation->removeElement($disponibiliteReservation);
        }

        return $this;
    }
}
