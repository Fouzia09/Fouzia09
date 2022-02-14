<?php

namespace App\dto\out;

use App\Entity\Comment;
use App\Entity\Favorite;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

class UserOUT {
    /**
     * @Groups("user:read")
     */
    private $id;

    /**
     * @Groups("user:read")
     */
    private $username;

    /**
     * @Groups("user:read")
     */
    private $name;

    /**
     * @Groups("user:read")
     */
    private $email;

    /**
     * @Groups("user:read")
     */
    private $siret;

    /**
     * @Groups("user:read")
     * 
     * 'ROLE_ADMIN', 'ROLE_USER', 'ROLE_HOTELIER', 'ROLE_CHEF'
     */
    private $roles;

    /**
     * @Groups("user:read")
     */
    private $createdAt;

    /**
     * @Groups({"user:read", "favorites:read"})
     */
    private $favorites;

    /**
     * @Groups({"user:read", "comments:read"})
     */
    private $comments;

    /**
     * @Groups({"user:read", "restaurants:read"})
     */
    private $restaurants;

    /**
     * @Groups({"user:read", "room:read"})
     */
    private $rooms;

    public function __construct(
        int $id,
        string $username,
        string $name,
        string $email,
        ?string $siret,
        array $roles,
        \DateTime $createdAt
        ) {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->siret = $siret;
        $this->roles = $roles;
        $this->createdAt = $createdAt;
        $this->favorites = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->restaurants = new ArrayCollection();
        $this->rooms = new ArrayCollection();
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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

    /**
     * @return Collection|FavoriteOUTFromUserOUT[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(FavoriteOUTFromUserOUT $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
        }

        return $this;
    }

    /**
     * @return Collection|CommentOUT[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(CommentOUT $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
        }

        return $this;
    }

    /**
     * @return Collection|RestaurantOUT[]
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(RestaurantOUT $restaurant): self
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants[] = $restaurant;
        }

        return $this;
    }

    /**
     * @return Collection|RoomOUT[]
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(RoomOUT $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms[] = $room;
        }

        return $this;
    }
}