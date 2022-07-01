<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
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
    private $produit;

    /**
     * @ORM\Column(type="float")
     */
    private $maxQte;

    /**
     * @ORM\Column(type="float")
     */
    private $minQte;

    /**
     * @ORM\Column(type="float")
     */
    private $Dispo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getMaxQte(): ?float
    {
        return $this->maxQte;
    }

    public function setMaxQte(float $maxQte): self
    {
        $this->maxQte = $maxQte;

        return $this;
    }

    public function getMinQte(): ?float
    {
        return $this->minQte;
    }

    public function setMinQte(string $minQte): self
    {
        $this->minQte = $minQte;

        return $this;
    }

    public function getDispo(): ?float
    {
        return $this->Dispo;
    }

    public function setDispo(float $Dispo): self
    {
        $this->Dispo = $Dispo;

        return $this;
    }
}
