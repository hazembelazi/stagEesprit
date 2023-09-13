<?php

namespace App\Entity;

use App\Repository\OrientationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrientationRepository::class)]
class Orientation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $nombre_de_place = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNombreDePlace(): ?int
    {
        return $this->nombre_de_place;
    }

    public function setNombreDePlace(int $nombre_de_place): static
    {
        $this->nombre_de_place = $nombre_de_place;

        return $this;
    }
}
