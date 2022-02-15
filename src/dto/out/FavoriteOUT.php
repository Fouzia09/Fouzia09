<?php

namespace App\dto\out;

use Symfony\Component\Serializer\Annotation\Groups;

class FavoriteOUT {
    /**
     * @Groups({"favorite:read", "user:read"})
     */
    private $id;

    /**
     * @Groups({"favorite:read", "user:read"})
     */
    private $itemName;

    /**
     * @Groups({"favorite:read", "user:read"})
     */
    private $itemUrl;

    /**
     * @Groups({"favorite:read", "user:read"})
     */
    private $itemImage;

    /**
     * @Groups({"favorite:read", "user:read"})
     * 
     * @var string[]
     */
    private $users;

    public function __construct(int $id, string $itemName, string $itemUrl, string $itemImage) {
        $this->id = $id;
        $this->itemName = $itemName;
        $this->itemUrl = $itemUrl;
        $this->itemImage = $itemImage;
        $this->users = [];
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

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(?string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemUrl(): ?string
    {
        return $this->itemUrl;
    }

    public function setItemUrl(?string $itemUrl): self
    {
        $this->itemUrl = $itemUrl;

        return $this;
    }

    public function getItemImage(): ?string
    {
        return $this->itemImage;
    }

    public function setItemImage(?string $itemImage): self
    {
        $this->itemImage = $itemImage;

        return $this;
    }

    public function getUsers(): array
    {
        $users = $this->users;

        return array_unique($users);
    }

    public function addUser(int $userId): self
    {
        $user = "api/users/".$userId;
        array_push($this->users, $user);

        return $this;
    }
}