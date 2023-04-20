<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $guestsNoon = null;

    #[ORM\Column]
    private ?int $guestsEvening = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuestsNoon(): ?int
    {
        return $this->guestsNoon;
    }

    public function setGuestsNoon(int $guestsNoon): self
    {
        $this->guestsNoon = $guestsNoon;

        return $this;
    }

    public function getGuestsEvening(): ?int
    {
        return $this->guestsEvening;
    }

    public function setGuestsEvening(int $guestsEvening): self
    {
        $this->guestsEvening = $guestsEvening;

        return $this;
    }
}
