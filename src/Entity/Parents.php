<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParentsRepository")
 * @UniqueEntity(fields={"Parents_pseudo"}, message="There is already an account with this Parents_pseudo")
 */
class Parents implements UserInterface
{
    /**
     * @ORM\Id()composer require doctrine/doctrine-bundle
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $Parents_pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $Parents_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $Parents_mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $Parents_token;

    /**
     * @ORM\Column(type="array")
     */
    protected $Parents_role = ["Utilisateur"];

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $Parents_prenom;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $Parents_nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $Parents_adresse;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    protected $Parents_telephone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $Parents_cp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $Parents_ville;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $Parents_status = 1;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $Parents_date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $Parents_date_modif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enfants", mappedBy="Enfants_parents")
     */
    protected $Parents_enfants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="Reservations_parents", orphanRemoval=true)
     */
    protected $Parents_reservations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="Avis_parents", orphanRemoval=true)
     */
    protected $Parents_Avis;

    public function __construct()
    {
        $this->Parents_enfants = new ArrayCollection();
        $this->Parents_reservations = new ArrayCollection();
        $this->Parents_Avis = new ArrayCollection();
        $this->Parents_token = bin2hex(random_bytes(10));
        $this->Parents_date_creation = new \DateTime('now', new \DateTimeZone('Europe/Paris'));

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentsPseudo(): ?string
    {
        return $this->Parents_pseudo;
    }

    public function setParentsPseudo(string $Parents_pseudo): self
    {
        $this->Parents_pseudo = $Parents_pseudo;

        return $this;
    }

    public function getParentsMail(): ?string
    {
        return $this->Parents_mail;
    }

    public function getEmail()
    {
        return $this->Parents_mail;
    }

    public function setEmail($Parents_mail)
    {
        $this->Parents_mail = $Parents_mail;
    }

    public function setParentsMail(string $Parents_mail): self
    {
        $this->Parents_mail = $Parents_mail;

        return $this;
    }

    public function getParentsMdp(): ?string
    {
        return $this->Parents_mdp;
    }

    public function setParentsMdp(string $Parents_mdp): self
    {
        $this->Parents_mdp = $Parents_mdp;

        return $this;
    }

    public function getParentsToken(): ?string
    {
        return $this->Parents_token;
    }

    public function setParentsToken(string $Parents_token): self
    {
        $this->Parents_token = $Parents_token;

        return $this;
    }

    public function getParentsRole(): ?array
    {
        return $this->Parents_role;
    }

    public function setParentsRole(array $Parents_role): self
    {
        $this->Parents_role = $Parents_role;

        return $this;
    }

    public function getRoles()
    {
        return $this->Parents_role;
    }

    public function getParentsPrenom(): ?string
    {
        return $this->Parents_prenom;
    }

    public function setParentsPrenom(?string $Parents_prenom): self
    {
        $this->Parents_prenom = $Parents_prenom;

        return $this;
    }

    public function getParentsNom(): ?string
    {
        return $this->Parents_nom;
    }

    public function setParentsNom(?string $Parents_nom): self
    {
        $this->Parents_nom = $Parents_nom;

        return $this;
    }

    public function getParentsAdresse(): ?string
    {
        return $this->Parents_adresse;
    }

    public function setParentsAdresse(?string $Parents_adresse): self
    {
        $this->Parents_adresse = $Parents_adresse;

        return $this;
    }

    public function getParentsTelephone(): ?string
    {
        return $this->Parents_telephone;
    }

    public function setParentsTelephone(?string $Parents_telephone): self
    {
        $this->Parents_telephone = $Parents_telephone;

        return $this;
    }

    public function getParentsCp(): ?int
    {
        return $this->Parents_cp;
    }

    public function setParentsCp(?int $Parents_cp): self
    {
        $this->Parents_cp = $Parents_cp;

        return $this;
    }

    public function getParentsVille(): ?string
    {
        return $this->Parents_ville;
    }

    public function setParentsVille(?string $Parents_ville): self
    {
        $this->Parents_ville = $Parents_ville;

        return $this;
    }

    public function getParentsStatus(): ?bool
    {
        return $this->Parents_status;
    }

    public function setParentsStatus(bool $Parents_status): self
    {
        $this->Parents_status = $Parents_status;

        return $this;
    }

    public function getParentsDateCreation(): ?\DateTimeInterface
    {
        return $this->Parents_date_creation;
    }

    public function setParentsDateCreation(\DateTimeInterface $Parents_date_creation): self
    {
        $this->Parents_date_creation = $Parents_date_creation;

        return $this;
    }

    public function getParentsDateModif(): ?\DateTimeInterface
    {
        return $this->Parents_date_modif;
    }

    public function setParentsDateModif(?\DateTimeInterface $Parents_date_modif): self
    {
        $this->Parents_date_modif = new \DateTime('now', new \DateTimeZone('Europe/Paris'));

        return $this;
    }


    public function getUsername()
    {
        return $this->Parents_pseudo;
    }

    public function getPassword()
    {
        return $this->Parents_mdp;
    }


    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }


    /**
     * @return Collection|Enfants[]
     */
    public function getParentsEnfants(): Collection
    {
        return $this->Parents_enfants;
    }

    public function addParentsEnfant(Enfants $parentsEnfant): self
    {
        if (!$this->Parents_enfants->contains($parentsEnfant)) {
            $this->Parents_enfants[] = $parentsEnfant;
            $parentsEnfant->setEnfantsParents($this);
        }

        return $this;
    }


    public function removeParentsEnfant(Enfants $parentsEnfant): self
    {
        if ($this->Parents_enfants->contains($parentsEnfant)) {
            $this->Parents_enfants->removeElement($parentsEnfant);
            // set the owning side to null (unless already changed)
            if ($parentsEnfant->getEnfantsParents() === $this) {
                $parentsEnfant->setEnfantsParents(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getParentsReservations(): Collection
    {
        return $this->Parents_reservations;
    }

    public function addParentsReservation(Reservations $parentsReservation): self
    {
        if (!$this->Parents_reservations->contains($parentsReservation)) {
            $this->Parents_reservations[] = $parentsReservation;
            $parentsReservation->setReservationsParents($this);
        }

        return $this;
    }

    public function removeParentsReservation(Reservations $parentsReservation): self
    {
        if ($this->Parents_reservations->contains($parentsReservation)) {
            $this->Parents_reservations->removeElement($parentsReservation);
            // set the owning side to null (unless already changed)
            if ($parentsReservation->getReservationsParents() === $this) {
                $parentsReservation->setReservationsParents(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getParentsAvis(): Collection
    {
        return $this->Parents_Avis;
    }

    public function addParentsAvi(Avis $parentsAvi): self
    {
        if (!$this->Parents_Avis->contains($parentsAvi)) {
            $this->Parents_Avis[] = $parentsAvi;
            $parentsAvi->setAvisParents($this);
        }

        return $this;
    }

    public function removeParentsAvi(Avis $parentsAvi): self
    {
        if ($this->Parents_Avis->contains($parentsAvi)) {
            $this->Parents_Avis->removeElement($parentsAvi);
            // set the owning side to null (unless already changed)
            if ($parentsAvi->getAvisParents() === $this) {
                $parentsAvi->setAvisParents(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->Parents_pseudo . ' ['.strval($this->id) . '] ';
    }
}
