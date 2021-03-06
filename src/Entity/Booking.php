<?php

namespace App\Entity;
use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $pickLocation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pickDate;

    /**
     * @ORM\Column(type="datetime")
   
     */
    private $returnDate;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="booking")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="bookings")
     */
    private $model;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPickLocation(): ?string
    {
        return $this->pickLocation;
    }

    public function setPickLocation(string $pickLocation): self
    {
        $this->pickLocation = $pickLocation;

        return $this;
    }

    public function getPickDate(): ?\DateTimeInterface
    {
        return $this->pickDate;
    }

    public function setPickDate(\DateTimeInterface $pickDate): self
    {
        $this->pickDate = $pickDate;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function __toString(): ?string
    {
        return '';
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }
   
      

}
