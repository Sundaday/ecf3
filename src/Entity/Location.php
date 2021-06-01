<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateStartLocation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEndLocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeCategory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeAssurance;

    /**
     * @ORM\Column(type="integer")
     */
    private $kmStartLocation;

    /**
     * @ORM\Column(type="integer")
     */
    private $kmEndLocation;

    /**
     * @ORM\Column(type="integer")
     */
    private $fuelStartLocation;

    /**
     * @ORM\Column(type="integer")
     */
    private $cautionLocation;

    /**
     * @ORM\Column(type="integer")
     */
    private $cautionRetenuLocation;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="louerVehicule")
     */
    private $vehicules;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="locations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userLocation;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStartLocation(): ?\DateTimeInterface
    {
        return $this->dateStartLocation;
    }

    public function setDateStartLocation(\DateTimeInterface $dateStartLocation): self
    {
        $this->dateStartLocation = $dateStartLocation;

        return $this;
    }

    public function getDateEndLocation(): ?\DateTimeInterface
    {
        return $this->dateEndLocation;
    }

    public function setDateEndLocation(\DateTimeInterface $dateEndLocation): self
    {
        $this->dateEndLocation = $dateEndLocation;

        return $this;
    }

    public function getTypeVehicule(): ?string
    {
        return $this->typeVehicule;
    }

    public function setTypeVehicule(string $typeVehicule): self
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    public function getTypeCategory(): ?string
    {
        return $this->typeCategory;
    }

    public function setTypeCategory(string $typeCategory): self
    {
        $this->typeCategory = $typeCategory;

        return $this;
    }

    public function getTypeAssurance(): ?string
    {
        return $this->typeAssurance;
    }

    public function setTypeAssurance(string $typeAssurance): self
    {
        $this->typeAssurance = $typeAssurance;

        return $this;
    }

    public function getKmStartLocation(): ?int
    {
        return $this->kmStartLocation;
    }

    public function setKmStartLocation(int $kmStartLocation): self
    {
        $this->kmStartLocation = $kmStartLocation;

        return $this;
    }

    public function getKmEndLocation(): ?int
    {
        return $this->kmEndLocation;
    }

    public function setKmEndLocation(int $kmEndLocation): self
    {
        $this->kmEndLocation = $kmEndLocation;

        return $this;
    }

    public function getFuelStartLocation(): ?int
    {
        return $this->fuelStartLocation;
    }

    public function setFuelStartLocation(int $fuelStartLocation): self
    {
        $this->fuelStartLocation = $fuelStartLocation;

        return $this;
    }

    public function getCautionLocation(): ?int
    {
        return $this->cautionLocation;
    }

    public function setCautionLocation(int $cautionLocation): self
    {
        $this->cautionLocation = $cautionLocation;

        return $this;
    }

    public function getCautionRetenuLocation(): ?int
    {
        return $this->cautionRetenuLocation;
    }

    public function setCautionRetenuLocation(int $cautionRetenuLocation): self
    {
        $this->cautionRetenuLocation = $cautionRetenuLocation;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setLouerVehicule($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getLouerVehicule() === $this) {
                $vehicule->setLouerVehicule(null);
            }
        }

        return $this;
    }

    public function getUserLocation(): ?User
    {
        return $this->userLocation;
    }

    public function setUserLocation(?User $userLocation): self
    {
        $this->userLocation = $userLocation;

        return $this;
    }
}
