<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RoleRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"role:read"}},
 *      denormalizationContext={"groups"={"role:write"}}
 * )
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("role:read")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * 
     * @Groups("role:read")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="roles")
     * 
     * @Groups("role:read")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="roles")
     * @ORM\JoinColumn(nullable=false)
     * 
     * @Groups("role:read")
     */
    private $admins;


    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addRole($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeRole($this);
        }

        return $this;
    }

    public function getAdmins(): ?Admin
    {
        return $this->admins;
    }

    public function setAdmins(?Admin $admins): self
    {
        $this->admins = $admins;

        return $this;
    }


}
