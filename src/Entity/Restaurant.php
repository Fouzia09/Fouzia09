<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RestaurantRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"restaurant:read"}},
 *      denormalizationContext={"groups"={"restaurant:write"}},
 *      collectionOperations={
 *         "get",
 *         "post"={"security"="is_granted('ROLE_USER')"}
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"security"="is_granted('edit', object)"},
 *         "delete"={"security"="is_granted('delete', object)"}
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *      "id": "exact",
 *      "price": "exact",
 *      "name": "partial"
 *     
 *     
 *     
 * })
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("restaurant:read", "user: read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $descriptif;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $namePlat;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $descriptifPlat;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $descriptifPlat2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $descriptifPlat3;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * 
     * @Groups({"restaurant:read", "restaurant:write"})
     */
    private $rangePrice;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * 
     * @Groups("restaurant:read")
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="restaurant", orphanRemoval=true)
     * @Groups("restaurant:read")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="restaurants")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("restaurant:read")
     */
    private $author;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("restaurant:read")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("restaurant:read")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->comments = new ArrayCollection();
    }

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setRestaurant($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRestaurant() === $this) {
                $comment->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(?bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
