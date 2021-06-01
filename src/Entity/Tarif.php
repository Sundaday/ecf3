<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifRepository::class)
 */
class Tarif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarifSemaine;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarifWeekend;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarifAssurance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tarifCaution;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="payerTarif")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifSemaine(): ?int
    {
        return $this->tarifSemaine;
    }

    public function setTarifSemaine(int $tarifSemaine): self
    {
        $this->tarifSemaine = $tarifSemaine;

        return $this;
    }

    public function getTarifWeekend(): ?int
    {
        return $this->tarifWeekend;
    }

    public function setTarifWeekend(int $tarifWeekend): self
    {
        $this->tarifWeekend = $tarifWeekend;

        return $this;
    }

    public function getTarifAssurance(): ?int
    {
        return $this->tarifAssurance;
    }

    public function setTarifAssurance(int $tarifAssurance): self
    {
        $this->tarifAssurance = $tarifAssurance;

        return $this;
    }

    public function getTarifCaution(): ?string
    {
        return $this->tarifCaution;
    }

    public function setTarifCaution(string $tarifCaution): self
    {
        $this->tarifCaution = $tarifCaution;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setPayerTarif($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getPayerTarif() === $this) {
                $category->setPayerTarif(null);
            }
        }

        return $this;
    }
}
