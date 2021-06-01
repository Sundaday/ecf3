<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $permisUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roleUser;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateStartPermis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateEndPermis;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateRegistration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirm_password;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="userLocation")
     */
    private $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(String $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(String $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(String $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }

    public function getAdresseUser(): ?string
    {
        return $this->adresseUser;
    }

    public function setAdresseUser(string $adresseUser): self
    {
        $this->adresseUser = $adresseUser;

        return $this;
    }

    public function getPermisUser(): ?string
    {
        return $this->permisUser;
    }

    public function setPermisUser(string $permisUser): self
    {
        $this->permisUser = $permisUser;

        return $this;
    }

    public function getRoleUser(): ?string
    {
        return $this->roleUser;
    }

    public function setRoleUser(string $roleUser): self
    {
        $this->roleUser = $roleUser;

        return $this;
    }

    public function getDateStartPermis(): ?\DateTimeInterface
    {
        return $this->dateStartPermis;
    }

    public function setDateStartPermis(\DateTimeInterface $dateStartPermis): self
    {
        $this->dateStartPermis = $dateStartPermis;

        return $this;
    }

    public function getDateEndPermis(): ?string
    {
        return $this->dateEndPermis;
    }

    public function setDateEndPermis(?string $dateEndPermis): self
    {
        $this->dateEndPermis = $dateEndPermis;

        return $this;
    }

    public function getDateRegistration(): ?\DateTimeInterface
    {
        return $this->dateRegistration;
    }

    public function setDateRegistration(\DateTimeInterface $dateRegistration): self
    {
        $this->dateRegistration = $dateRegistration;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setUserLocation($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getUserLocation() === $this) {
                $location->setUserLocation(null);
            }
        }

        return $this;
    }
}
