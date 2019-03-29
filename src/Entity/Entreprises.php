<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntreprisesRepository")
 */
class Entreprises
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
    private $Entreprises_pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Entreprises_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Entreprises_mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Entreprises_token;

    /**
     * @ORM\Column(type="array")
     */
    private $Entreprises_role = [];

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $Entreprises_nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Entreprises_effectifs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Entreprises_adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Entreprises_cp;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $Entreprises_ville;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $Entreprises_telephone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Entreprises_siret;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Entreprises_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Entreprises_horaires;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Entreprises_capacite;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Entreprises_note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Entreprises_tarif;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Entreprises_espace_exterieur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Entreprises_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Entreprises_date_creation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Entreprises_date_modif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="Reservations_entreprises", orphanRemoval=true)
     */
    private $Entreprises_reservations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="Avis_entreprises", orphanRemoval=true)
     */
    private $Entreprises_Avis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bracelet", mappedBy="Bracelet_entreprises", orphanRemoval=true)
     */
    private $Entreprises_Bracelet;

    public function __construct()
    {
        $this->Entreprises_reservations = new ArrayCollection();
        $this->Entreprises_Avis = new ArrayCollection();
        $this->Entreprises_Bracelet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprisesPseudo(): ?string
    {
        return $this->Entreprises_pseudo;
    }

    public function setEntreprisesPseudo(string $Entreprises_pseudo): self
    {
        $this->Entreprises_pseudo = $Entreprises_pseudo;

        return $this;
    }

    public function getEntreprisesMail(): ?string
    {
        return $this->Entreprises_mail;
    }

    public function setEntreprisesMail(string $Entreprises_mail): self
    {
        $this->Entreprises_mail = $Entreprises_mail;

        return $this;
    }

    public function getEntreprisesMdp(): ?string
    {
        return $this->Entreprises_mdp;
    }

    public function setEntreprisesMdp(string $Entreprises_mdp): self
    {
        $this->Entreprises_mdp = $Entreprises_mdp;

        return $this;
    }

    public function getEntreprisesToken(): ?string
    {
        return $this->Entreprises_token;
    }

    public function setEntreprisesToken(string $Entreprises_token): self
    {
        $this->Entreprises_token = $Entreprises_token;

        return $this;
    }

    public function getEntreprisesRole(): ?array
    {
        return $this->Entreprises_role;
    }

    public function setEntreprisesRole(array $Entreprises_role): self
    {
        $this->Entreprises_role = $Entreprises_role;

        return $this;
    }

    public function getEntreprisesNom(): ?string
    {
        return $this->Entreprises_nom;
    }

    public function setEntreprisesNom(?string $Entreprises_nom): self
    {
        $this->Entreprises_nom = $Entreprises_nom;

        return $this;
    }

    public function getEntreprisesEffectifs(): ?int
    {
        return $this->Entreprises_effectifs;
    }

    public function setEntreprisesEffectifs(?int $Entreprises_effectifs): self
    {
        $this->Entreprises_effectifs = $Entreprises_effectifs;

        return $this;
    }

    public function getEntreprisesAdresse(): ?string
    {
        return $this->Entreprises_adresse;
    }

    public function setEntreprisesAdresse(?string $Entreprises_adresse): self
    {
        $this->Entreprises_adresse = $Entreprises_adresse;

        return $this;
    }

    public function getEntreprisesCp(): ?int
    {
        return $this->Entreprises_cp;
    }

    public function setEntreprisesCp(?int $Entreprises_cp): self
    {
        $this->Entreprises_cp = $Entreprises_cp;

        return $this;
    }

    public function getEntreprisesVille(): ?string
    {
        return $this->Entreprises_ville;
    }

    public function setEntreprisesVille(?string $Entreprises_ville): self
    {
        $this->Entreprises_ville = $Entreprises_ville;

        return $this;
    }

    public function getEntreprisesTelephone(): ?string
    {
        return $this->Entreprises_telephone;
    }

    public function setEntreprisesTelephone(?string $Entreprises_telephone): self
    {
        $this->Entreprises_telephone = $Entreprises_telephone;

        return $this;
    }

    public function getEntreprisesSiret(): ?int
    {
        return $this->Entreprises_siret;
    }

    public function setEntreprisesSiret(?int $Entreprises_siret): self
    {
        $this->Entreprises_siret = $Entreprises_siret;

        return $this;
    }

    public function getEntreprisesDescription(): ?string
    {
        return $this->Entreprises_description;
    }

    public function setEntreprisesDescription(?string $Entreprises_description): self
    {
        $this->Entreprises_description = $Entreprises_description;

        return $this;
    }

    public function getEntreprisesHoraires(): ?string
    {
        return $this->Entreprises_horaires;
    }

    public function setEntreprisesHoraires(?string $Entreprises_horaires): self
    {
        $this->Entreprises_horaires = $Entreprises_horaires;

        return $this;
    }

    public function getEntreprisesCapacite(): ?int
    {
        return $this->Entreprises_capacite;
    }

    public function setEntreprisesCapacite(?int $Entreprises_capacite): self
    {
        $this->Entreprises_capacite = $Entreprises_capacite;

        return $this;
    }

    public function getEntreprisesNote(): ?float
    {
        return $this->Entreprises_note;
    }

    public function setEntreprisesNote(?float $Entreprises_note): self
    {
        $this->Entreprises_note = $Entreprises_note;

        return $this;
    }

    public function getEntreprisesTarif(): ?string
    {
        return $this->Entreprises_tarif;
    }

    public function setEntreprisesTarif(?string $Entreprises_tarif): self
    {
        $this->Entreprises_tarif = $Entreprises_tarif;

        return $this;
    }

    public function getEntreprisesEspaceExterieur(): ?bool
    {
        return $this->Entreprises_espace_exterieur;
    }

    public function setEntreprisesEspaceExterieur(?bool $Entreprises_espace_exterieur): self
    {
        $this->Entreprises_espace_exterieur = $Entreprises_espace_exterieur;

        return $this;
    }

    public function getEntreprisesStatus(): ?bool
    {
        return $this->Entreprises_status;
    }

    public function setEntreprisesStatus(bool $Entreprises_status): self
    {
        $this->Entreprises_status = $Entreprises_status;

        return $this;
    }

    public function getEntreprisesDateCreation(): ?\DateTimeInterface
    {
        return $this->Entreprises_date_creation;
    }

    public function setEntreprisesDateCreation(\DateTimeInterface $Entreprises_date_creation): self
    {
        $this->Entreprises_date_creation = $Entreprises_date_creation;

        return $this;
    }

    public function getEntreprisesDateModif(): ?\DateTimeInterface
    {
        return $this->Entreprises_date_modif;
    }

    public function setEntreprisesDateModif(\DateTimeInterface $Entreprises_date_modif): self
    {
        $this->Entreprises_date_modif = $Entreprises_date_modif;

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getEntreprisesReservations(): Collection
    {
        return $this->Entreprises_reservations;
    }

    public function addEntreprisesReservation(Reservations $entreprisesReservation): self
    {
        if (!$this->Entreprises_reservations->contains($entreprisesReservation)) {
            $this->Entreprises_reservations[] = $entreprisesReservation;
            $entreprisesReservation->setReservationsEntreprises($this);
        }

        return $this;
    }

    public function removeEntreprisesReservation(Reservations $entreprisesReservation): self
    {
        if ($this->Entreprises_reservations->contains($entreprisesReservation)) {
            $this->Entreprises_reservations->removeElement($entreprisesReservation);
            // set the owning side to null (unless already changed)
            if ($entreprisesReservation->getReservationsEntreprises() === $this) {
                $entreprisesReservation->setReservationsEntreprises(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getEntreprisesAvis(): Collection
    {
        return $this->Entreprises_Avis;
    }

    public function addEntreprisesAvi(Avis $entreprisesAvi): self
    {
        if (!$this->Entreprises_Avis->contains($entreprisesAvi)) {
            $this->Entreprises_Avis[] = $entreprisesAvi;
            $entreprisesAvi->setAvisEntreprises($this);
        }

        return $this;
    }

    public function removeEntreprisesAvi(Avis $entreprisesAvi): self
    {
        if ($this->Entreprises_Avis->contains($entreprisesAvi)) {
            $this->Entreprises_Avis->removeElement($entreprisesAvi);
            // set the owning side to null (unless already changed)
            if ($entreprisesAvi->getAvisEntreprises() === $this) {
                $entreprisesAvi->setAvisEntreprises(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bracelet[]
     */
    public function getEntreprisesBracelet(): Collection
    {
        return $this->Entreprises_Bracelet;
    }

    public function addEntreprisesBracelet(Bracelet $entreprisesBracelet): self
    {
        if (!$this->Entreprises_Bracelet->contains($entreprisesBracelet)) {
            $this->Entreprises_Bracelet[] = $entreprisesBracelet;
            $entreprisesBracelet->setBraceletEntreprises($this);
        }

        return $this;
    }

    public function removeEntreprisesBracelet(Bracelet $entreprisesBracelet): self
    {
        if ($this->Entreprises_Bracelet->contains($entreprisesBracelet)) {
            $this->Entreprises_Bracelet->removeElement($entreprisesBracelet);
            // set the owning side to null (unless already changed)
            if ($entreprisesBracelet->getBraceletEntreprises() === $this) {
                $entreprisesBracelet->setBraceletEntreprises(null);
            }
        }

        return $this;
    }
}
