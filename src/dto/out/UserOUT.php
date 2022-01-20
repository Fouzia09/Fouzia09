<?php

namespace App\dto\out;

class UserOUT {
    /**
     * @Groups("user:read")
     */
    private $id;

    /**
     * @Groups({"user:read", "user:write"})
     */
    private $name;

    /**
     * @Groups({"user:read", "user:write"})
     */
    private $email;

    /**
     * @Groups({"user:read", "user:write"})
     * 'ROLE_ADMIN', 'ROLE_USER', 'ROLE_HOTELIER', 'ROLE_CHEF'
     */
    private $roles;

    public function __construct(int $id, string $name, string $email, array $roles) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->roles = $roles;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        //$roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}