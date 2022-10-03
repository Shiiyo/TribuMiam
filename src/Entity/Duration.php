<?php

namespace App\Entity;

use App\Repository\DurationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DurationRepository::class)]
class Duration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbMinutes = null;

    #[ORM\Column]
    private ?int $nbHours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbMinutes(): ?int
    {
        return $this->nbMinutes;
    }

    public function setNbMinutes(int $nbMinutes): self
    {
        $this->nbMinutes = $nbMinutes;

        return $this;
    }

    public function getNbHours(): ?int
    {
        return $this->nbHours;
    }

    public function setNbHours(int $nbHours): self
    {
        $this->nbHours = $nbHours;

        return $this;
    }
}
