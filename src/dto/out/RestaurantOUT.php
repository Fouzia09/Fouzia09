<?php

namespace App\dto\out;

use Symfony\Component\Serializer\Annotation\Groups;

class RestaurantOUT {
    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $id;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $name;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $description;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $country;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $city;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $dishName;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $dishDescription;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $price;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $image1;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $image2;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $image3;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $dishDescription2;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $dishDescription3;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $rangePrice1;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $rangePrice2;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $address;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $zipCode;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $createdAt;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $isPublished;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $updatedAt;

    /**
     * @Groups({"restaurant:read", "user:read"})
     */
    private $slug;

    public function __construct(
        int $id,
        string $name,
        string $description,
        string $country,
        string $city,
        string $dishName,
        float $price,
        string $image1,
        ?string $image2,
        ?string $image3,
        \DateTime $createdAt,
        string $dishDescription,
        ?string $dishDescription2,
        ?string $dishDescription3,
        int $rangePrice1,
        int $rangePrice2,
        ?string $address,
        ?int $zipCode,
        ?bool $isPublished,
        ?\DateTime $updatedAt,
        string $slug
        ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->country = $country;
        $this->city = $city;
        $this->dishName = $dishName;
        $this->dishDescription = $dishDescription;
        $this->price = $price;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->dishDescription2 = $dishDescription2;
        $this->dishDescription3 = $dishDescription3;
        $this->rangePrice1 = $rangePrice1;
        $this->rangePrice2 = $rangePrice2;
        $this->address = $address;
        $this->zipCode = $zipCode;
        $this->createdAt = $createdAt;
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

    public function getDishName(): ?string
    {
        return $this->dishName;
    }

    public function setDishName(string $dishName): self
    {
        $this->dishName = $dishName;

        return $this;
    }

    public function getDishDescription(): ?string
    {
        return $this->dishDescription;
    }

    public function setDishDescription(string $dishDescription): self
    {
        $this->dishDescription = $dishDescription;

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

    public function getDishDescription2(): ?string
    {
        return $this->dishDescription2;
    }

    public function setDishDescription2(string $dishDescription2): self
    {
        $this->dishDescription2 = $dishDescription2;

        return $this;
    }

    public function getDishDescription3(): ?string
    {
        return $this->dishDescription3;
    }

    public function setDishDescription3(string $dishDescription3): self
    {
        $this->dishDescription3 = $dishDescription3;

        return $this;
    }

    public function getRangePrice1(): ?int
    {
        return $this->rangePrice1;
    }

    public function setRangePrice1(int $rangePrice1): self
    {
        $this->rangePrice1 = $rangePrice1;

        return $this;
    }

    public function getRangePrice2(): ?int
    {
        return $this->rangePrice2;
    }

    public function setRangePrice2(int $rangePrice2): self
    {
        $this->rangePrice2 = $rangePrice2;

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

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