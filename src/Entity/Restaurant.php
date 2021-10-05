<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namePlat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptifPlat;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptifPlat2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptifPlat3;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $rangePrice;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="restaurants")
     */
    private $users;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getNamePlat(): ?string
    {
        return $this->namePlat;
    }

    public function setNamePlat(string $namePlat): self
    {
        $this->namePlat = $namePlat;

        return $this;
    }

    public function getDescriptifPlat(): ?string
    {
        return $this->descriptifPlat;
    }

    public function setDescriptifPlat(string $descriptifPlat): self
    {
        $this->descriptifPlat = $descriptifPlat;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getDescriptifPlat2(): ?string
    {
        return $this->descriptifPlat2;
    }

    public function setDescriptifPlat2(?string $descriptifPlat2): self
    {
        $this->descriptifPlat2 = $descriptifPlat2;

        return $this;
    }

    public function getDescriptifPlat3(): ?string
    {
        return $this->descriptifPlat3;
    }

    public function setDescriptifPlat3(?string $descriptifPlat3): self
    {
        $this->descriptifPlat3 = $descriptifPlat3;

        return $this;
    }

    public function getRangePrice(): ?string
    {
        return $this->rangePrice;
    }

    public function setRangePrice(?string $rangePrice): self
    {
        $this->rangePrice = $rangePrice;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }


}
