<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"comment:read"}},
 *      denormalizationContext={"groups"={"comment:write"}},
 *      collectionOperations={
 *         "get",
 *         "post"
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"security"="is_granted('edit', object)"},
 *         "delete"={"security"="is_granted('delete', object)"}
 *     }
 * )
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"comment:read", "restaurant:read", "room:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"comment:read", "comment:write", "restaurant:read", "room:read"})
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("comment:write")
     */
    private $restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("comment:write")
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
