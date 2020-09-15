<?php

namespace App\Entity;

use App\Repository\CarSearchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarSearchRepository::class)
 */
class CarSearch
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
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
