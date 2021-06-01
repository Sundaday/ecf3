<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $nomVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marqueVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carburantVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatVehicule;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAchat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeVehicule;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $choisirCategory;

    /**
     * @ORM\ManyToOne(targetEntity=Agency::class, inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $choisirAgence;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $louerVehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVehicule(): ?string
    {
        return $this->nomVehicule;
    }

    public function setNomVehicule(string $nomVehicule): self
    {
        $this->nomVehicule = $nomVehicule;

        return $this;
    }

    public function getMarqueVehicule(): ?string
    {
        return $this->marqueVehicule;
    }

    public function setMarqueVehicule(string $marqueVehicule): self
    {
        $this->marqueVehicule = $marqueVehicule;

        return $this;
    }

    public function getCarburantVehicule(): ?string
    {
        return $this->carburantVehicule;
    }

    public function setCarburantVehicule(string $carburantVehicule): self
    {
        $this->carburantVehicule = $carburantVehicule;

        return $this;
    }

    public function getImmatVehicule(): ?string
    {
        return $this->immatVehicule;
    }

    public function setImmatVehicule(string $immatVehicule): self
    {
        $this->immatVehicule = $immatVehicule;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

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

    public function getChoisirCategory(): ?Category
    {
        return $this->choisirCategory;
    }

    public function setChoisirCategory(?Category $choisirCategory): self
    {
        $this->choisirCategory = $choisirCategory;

        return $this;
    }

    public function getChoisirAgence(): ?Agency
    {
        return $this->choisirAgence;
    }

    public function setChoisirAgence(?Agency $choisirAgence): self
    {
        $this->choisirAgence = $choisirAgence;

        return $this;
    }

    public function getLouerVehicule(): ?Location
    {
        return $this->louerVehicule;
    }

    public function setLouerVehicule(?Location $louerVehicule): self
    {
        $this->louerVehicule = $louerVehicule;

        return $this;
    }
}
