<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_articles = null;

    #[ORM\Column(length: 255)]
    private ?string $description_articles = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $prix_articles = null;

    #[ORM\Column(length: 60)]
    private ?string $nds_articles = null;

    #[ORM\Column]
    private ?int $quantite_articles = null;

    #[ORM\Column(length: 100)]
    private ?string $marque_articles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArticles(): ?string
    {
        return $this->nom_articles;
    }

    public function setNomArticles(string $nom_articles): self
    {
        $this->nom_articles = $nom_articles;

        return $this;
    }

    public function getDescriptionArticles(): ?string
    {
        return $this->description_articles;
    }

    public function setDescriptionArticles(string $description_articles): self
    {
        $this->description_articles = $description_articles;

        return $this;
    }

    public function getPrixArticles(): ?string
    {
        return $this->prix_articles;
    }

    public function setPrixArticles(string $prix_articles): self
    {
        $this->prix_articles = $prix_articles;

        return $this;
    }

    public function getNdsArticles(): ?string
    {
        return $this->nds_articles;
    }

    public function setNdsArticles(string $nds_articles): self
    {
        $this->nds_articles = $nds_articles;

        return $this;
    }

    public function getQuantiteArticles(): ?int
    {
        return $this->quantite_articles;
    }

    public function setQuantiteArticles(int $quantite_articles): self
    {
        $this->quantite_articles = $quantite_articles;

        return $this;
    }

    public function getMarqueArticles(): ?string
    {
        return $this->marque_articles;
    }

    public function setMarqueArticles(string $marque_articles): self
    {
        $this->marque_articles = $marque_articles;

        return $this;
    }
}
