<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_media = null;

    #[ORM\Column(length: 100)]
    private ?string $url_media = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedia(): ?string
    {
        return $this->nom_media;
    }

    public function setNomMedia(string $nom_media): self
    {
        $this->nom_media = $nom_media;

        return $this;
    }

    public function getUrlMedia(): ?string
    {
        return $this->url_media;
    }

    public function setUrlMedia(string $url_media): self
    {
        $this->url_media = $url_media;

        return $this;
    }
}
