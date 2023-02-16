<?php

namespace App\Entity;

use App\Repository\HourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HourRepository::class)]
class Hour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $noonOpening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $noonClosing = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $eveningOpening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $eveningClosing = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getNoonOpening(): ?\DateTimeInterface
    {
        return $this->noonOpening;
    }

    public function setNoonOpening(\DateTimeInterface $noonOpening): self
    {
        $this->noonOpening = $noonOpening;

        return $this;
    }

    public function getNoonClosing(): ?\DateTimeInterface
    {
        return $this->noonClosing;
    }

    public function setNoonClosing(\DateTimeInterface $noonClosing): self
    {
        $this->noonClosing = $noonClosing;

        return $this;
    }

    public function getEveningOpening(): ?\DateTimeInterface
    {
        return $this->eveningOpening;
    }

    public function setEveningOpening(\DateTimeInterface $eveningOpening): self
    {
        $this->eveningOpening = $eveningOpening;

        return $this;
    }

    public function getEveningClosing(): ?\DateTimeInterface
    {
        return $this->eveningClosing;
    }

    public function setEveningClosing(\DateTimeInterface $eveningClosing): self
    {
        $this->eveningClosing = $eveningClosing;

        return $this;
    }
}
