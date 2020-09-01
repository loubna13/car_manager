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
     * @ORM\Column(type="string", length=200)
     */
    private $pickCar;

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

    public function getPickCar(): ?string
    {
        return $this->pickCar;
    }

    public function setPickCar(string $pickCar): self
    {
        $this->pickCar = $pickCar;

        return $this;
    }
}
