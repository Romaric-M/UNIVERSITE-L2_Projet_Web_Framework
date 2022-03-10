<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_reservation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_reservation;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="reservations")
     */
    private $id_client;

    /**
     * @ORM\ManyToOne(targetEntity=Horaire::class, inversedBy="reservations")
     */
    private $heure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomReservation(): ?string
    {
        return $this->nom_reservation;
    }

    public function setNomReservation(string $nom_reservation): self
    {
        $this->nom_reservation = $nom_reservation;

        return $this;
    }

    public function getPrenomReservation(): ?string
    {
        return $this->prenom_reservation;
    }

    public function setPrenomReservation(string $prenom_reservation): self
    {
        $this->prenom_reservation = $prenom_reservation;

        return $this;
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

    public function getIdClient(): ?Utilisateur
    {
        return $this->id_client;
    }

    public function setIdClient(?Utilisateur $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getHeure(): ?Horaire
    {
        return $this->heure;
    }

    public function setHeure(?Horaire $heure): self
    {
        $this->heure = $heure;

        return $this;
    }
}
