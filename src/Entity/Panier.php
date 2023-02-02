<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $history_panier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistoryPanier(): ?string
    {
        return $this->history_panier;
    }

    public function setHistoryPanier(string $history_panier): self
    {
        $this->history_panier = $history_panier;

        return $this;
    }
}
