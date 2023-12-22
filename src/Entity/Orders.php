<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $initialPayment = null;

    #[ORM\Column]
    private ?int $term = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?cars $carID = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?programs $programID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitialPayment(): ?int
    {
        return $this->initialPayment;
    }

    public function setInitialPayment(?int $initialPayment): static
    {
        $this->initialPayment = $initialPayment;

        return $this;
    }

    public function getTerm(): ?int
    {
        return $this->term;
    }

    public function setTerm(int $term): static
    {
        $this->term = $term;

        return $this;
    }

    public function getCarID(): ?cars
    {
        return $this->carID;
    }

    public function setCarID(?cars $carID): static
    {
        $this->carID = $carID;

        return $this;
    }

    public function getProgramID(): ?programs
    {
        return $this->programID;
    }

    public function setProgramID(?programs $programID): static
    {
        $this->programID = $programID;

        return $this;
    }
}
