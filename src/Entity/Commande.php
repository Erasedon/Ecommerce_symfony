<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $numero_commande = null;

    #[ORM\Column]
    private ?int $quantite_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $montant_commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?string
    {
        return $this->numero_commande;
    }

    public function setNumeroCommande(string $numero_commande): self
    {
        $this->numero_commande = $numero_commande;

        return $this;
    }

    public function getQuantiteCommande(): ?int
    {
        return $this->quantite_commande;
    }

    public function setQuantiteCommande(int $quantite_commande): self
    {
        $this->quantite_commande = $quantite_commande;

        return $this;
    }

    public function getMontantCommande(): ?string
    {
        return $this->montant_commande;
    }

    public function setMontantCommande(string $montant_commande): self
    {
        $this->montant_commande = $montant_commande;

        return $this;
    }
}
