<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationsRepository")
 */
class Reservations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $Reservations_status_reservation = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $Reservations_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Reservations_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Reservations_date_modif;

    /**
     * @ORM\Column(type="date")
     */
    private $Reservations_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $Reservations_fin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="Parents_reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reservations_parents;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprises", inversedBy="Entreprises_reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reservations_entreprises;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Disponibilite", mappedBy="Disponibilite_reservation")
     */
    private $Reservations;

    public function __construct()
    {
        $this->Reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationsStatusReservation(): ?array
    {
        return $this->Reservations_status_reservation;
    }

    public function setReservationsStatusReservation(array $Reservations_status_reservation): self
    {
        $this->Reservations_status_reservation = $Reservations_status_reservation;

        return $this;
    }

    public function getReservationsStatus(): ?bool
    {
        return $this->Reservations_status;
    }

    public function setReservationsStatus(bool $Reservations_status): self
    {
        $this->Reservations_status = $Reservations_status;

        return $this;
    }

    public function getReservationsDateCreation(): ?\DateTimeInterface
    {
        return $this->Reservations_date_creation;
    }

    public function setReservationsDateCreation(\DateTimeInterface $Reservations_date_creation): self
    {
        $this->Reservations_date_creation = $Reservations_date_creation;

        return $this;
    }

    public function getReservationsDateModif(): ?\DateTimeInterface
    {
        return $this->Reservations_date_modif;
    }

    public function setReservationsDateModif(?\DateTimeInterface $Reservations_date_modif): self
    {
        $this->Reservations_date_modif = $Reservations_date_modif;

        return $this;
    }

    public function getReservationsDebut(): ?\DateTimeInterface
    {
        return $this->Reservations_debut;
    }

    public function setReservationsDebut(\DateTimeInterface $Reservations_debut): self
    {
        $this->Reservations_debut = $Reservations_debut;

        return $this;
    }

    public function getReservationsFin(): ?\DateTimeInterface
    {
        return $this->Reservations_fin;
    }

    public function setReservationsFin(\DateTimeInterface $Reservations_fin): self
    {
        $this->Reservations_fin = $Reservations_fin;

        return $this;
    }

    public function getReservationsParents(): ?Parents
    {
        return $this->Reservations_parents;
    }

    public function setReservationsParents(?Parents $Reservations_parents): self
    {
        $this->Reservations_parents = $Reservations_parents;

        return $this;
    }

    public function getReservationsEntreprises(): ?Entreprises
    {
        return $this->Reservations_entreprises;
    }

    public function setReservationsEntreprises(?Entreprises $Reservations_entreprises): self
    {
        $this->Reservations_entreprises = $Reservations_entreprises;

        return $this;
    }

    /**
     * @return Collection|Disponibilite[]
     */
    public function getReservations(): Collection
    {
        return $this->Reservations;
    }

    public function addReservation(Disponibilite $reservation): self
    {
        if (!$this->Reservations->contains($reservation)) {
            $this->Reservations[] = $reservation;
            $reservation->addDisponibiliteReservation($this);
        }

        return $this;
    }

    public function removeReservation(Disponibilite $reservation): self
    {
        if ($this->Reservations->contains($reservation)) {
            $this->Reservations->removeElement($reservation);
            $reservation->removeDisponibiliteReservation($this);
        }

        return $this;
    }
    public function __toString()
    {
        return strval($this->id);
    }
}
