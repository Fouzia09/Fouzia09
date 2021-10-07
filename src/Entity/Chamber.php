<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ChamberRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"chamber:read"}},
 *      denormalizationContext={"groups"={"chamber:write"}}
 * )
 * @ORM\Entity(repositoryClass=ChamberRepository::class)
 */
class Chamber
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("chamber:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"chamber:read", "chamber:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"chamber:read", "chamber:write"})
     */
    private $descriptif;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"chamber:read", "chamber:write"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"chamber:read", "chamber:write"})
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"chamber:read", "chamber:write"})
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"chamber:read", "chamber:write"})
     */
    private $image3;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="chambers")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups("chamber:read")
     */
    private $slug;

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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

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
