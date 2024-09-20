<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass=App\Repository\UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $lastname;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $phone;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private ?string $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $password;

    /**
     * @ORM\Column(type="json")
     */
    private array $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=ResetPasswordRequest::class, mappedBy="user")
     */
    private $resetPasswordRequests;

    public function __construct()
    {
        $this->resetPasswordRequests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): static
    {
        $this->phone = $phone;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // Ensure every user has at least one role
        $roles[] = 'ROLE_CLIENT'; // Default role for regular users
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getResetPasswordRequests(): Collection
    {
        return $this->resetPasswordRequests;
    }

    public function addResetPasswordRequest(ResetPasswordRequest $resetPasswordRequest): self
    {
        if (!$this->resetPasswordRequests->contains($resetPasswordRequest)) {
            $this->resetPasswordRequests[] = $resetPasswordRequest;
            $resetPasswordRequest->setUser($this);
        }
        return $this;
    }

    public function removeResetPasswordRequest(ResetPasswordRequest $resetPasswordRequest): self
    {
        if ($this->resetPasswordRequests->removeElement($resetPasswordRequest)) {
            if ($resetPasswordRequest->getUser() === $this) {
                $resetPasswordRequest->setUser(null);
            }
        }
        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
