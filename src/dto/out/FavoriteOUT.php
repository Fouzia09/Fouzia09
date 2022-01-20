<?php

namespace App\dto\out;

class FavoriteOUT {
    /**
     * @Groups("favorite:read")
     */
    private $id;

    /**
     * @Groups({"favorite:read", "favorite:write"})
     */
    private $itemName;

    /**
     * @Groups({"favorite:read", "favorite:write"})
     */
    private $itemUrl;

    /**
     * @Groups({"favorite:read", "favorite:write"})
     */
    private $itemImage;

    public function __construct(int $id, string $itemName, string $itemUrl, string $itemImage) {
        $this->id = $id;
        $this->itemName = $itemName;
        $this->itemUrl = $itemUrl;
        $this->itemImage = $itemImage;
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
}