<?php

namespace App\dto\out;

use Symfony\Component\Serializer\Annotation\Groups;

class RoomOUT {
    /**
     * @Groups({"room:read", "user:read"})
     */
    private $id;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $name;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $description;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $country;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $city;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $price;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $image1;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $image2;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $image3;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $createdAt;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $isKingSize;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $nbBed;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $squarFeet;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $address;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $zipCode;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $isPublished;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $updatedAt;

    /**
     * @Groups({"room:read", "user:read"})
     */
    private $slug;

    public function __construct(
        int $id,
        string $name,
        string $description,
        string $country,
        string $city,
        float $price,
        string $image1,
        ?string $image2,
        ?string $image3,
        \DateTime $createdAt,
        bool $isKingSize,
        int $nbBed,
        int $squarFeet,
        ?string $address,
        int $zipCode,
        ?bool $isPublished,
        ?\DateTime $updatedAt,
        string $slug
        ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->country = $country;
        $this->city = $city;
        $this->price = $price;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->createdAt = $createdAt;
        $this->isKingSize = $isKingSize;
        $this->nbBed = $nbBed;
        $this->squarFeet = $squarFeet;
        $this->address = $address;
        $this->zipCode = $zipCode;
        $this->isPublished = $isPublished;
        $this->updatedAt = $updatedAt;
        $this->slug = $slug;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

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

    public function setImage2(string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIsKingSize(): ?bool
    {
        return $this->isKingSize;
    }

    public function setIsKingSize(bool $isKingSize): self
    {
        $this->isKingSize = $isKingSize;

        return $this;
    }

    public function getNbBed(): ?int
    {
        return $this->nbBed;
    }

    public function setNbBed(int $nbBed): self
    {
        $this->nbBed = $nbBed;

        return $this;
    }

    public function getSquarFeet(): ?int
    {
        return $this->squarFeet;
    }

    public function setSquarFeet(int $squarFeet): self
    {
        $this->squarFeet = $squarFeet;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}