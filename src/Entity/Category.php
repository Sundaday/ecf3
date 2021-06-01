<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $nomCategory;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="choisirCategory")
     */
    private $vehicules;

    /**
     * @ORM\ManyToOne(targetEntity=Tarif::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $payerTarif;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategory(): ?string
    {
        return $this->nomCategory;
    }

    public function setNomCategory(string $nomCategory): self
    {
        $this->nomCategory = $nomCategory;

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
            $vehicule->setChoisirCategory($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getChoisirCategory() === $this) {
                $vehicule->setChoisirCategory(null);
            }
        }

        return $this;
    }

    public function getPayerTarif(): ?Tarif
    {
        return $this->payerTarif;
    }

    public function setPayerTarif(?Tarif $payerTarif): self
    {
        $this->payerTarif = $payerTarif;

        return $this;
    }
}
