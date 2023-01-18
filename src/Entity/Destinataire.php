<?php

namespace App\Entity;

use App\Repository\DestinataireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DestinataireRepository::class)]
class Destinataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $des_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $des_email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesNom(): ?string
    {
        return $this->des_nom;
    }

    public function setDesNom(string $des_nom): self
    {
        $this->des_nom = $des_nom;

        return $this;
    }

    public function getDesEmail(): ?string
    {
        return $this->des_email;
    }

    public function setDesEmail(string $des_email): self
    {
        $this->des_email = $des_email;

        return $this;
    }
}
