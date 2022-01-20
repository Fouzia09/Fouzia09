<?php

namespace App\dto\out;

class CommentOUT {
    /**
     * @Groups({"comment:read", "restaurant:read", "room:read"})
     */
    private $id;

    /**
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $author;

    /**
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $content;

    /**
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $createdAt;

    /**
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $restaurantId;

    /**
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $roomId;

    public function __construct(int $id, string $author, string $content, \DateTimeInterface $createdAt) {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
        $this->createdAt = $createdAt;
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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
}