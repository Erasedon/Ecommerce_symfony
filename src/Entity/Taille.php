<?php

namespace App\Entity;

use App\Repository\TailleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TailleRepository::class)]
class Taille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_taille = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTaille(): ?string
    {
        return $this->nom_taille;
    }

    public function setNomTaille(string $nom_taille): self
    {
        $this->nom_taille = $nom_taille;

        return $this;
    }
}
