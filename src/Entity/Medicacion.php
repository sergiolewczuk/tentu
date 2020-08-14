<?php

namespace App\Entity;

use App\Repository\MedicacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicacionRepository::class)
 */
class Medicacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dosis;

    /**
     * @ORM\ManyToOne(targetEntity=HistoriaClinica::class, inversedBy="unasMedicaciones")
     */
    private $unaHistoriaClinica;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDosis(): ?string
    {
        return $this->dosis;
    }

    public function setDosis(string $dosis): self
    {
        $this->dosis = $dosis;

        return $this;
    }

    public function getUnaHistoriaClinica(): ?HistoriaClinica
    {
        return $this->unaHistoriaClinica;
    }

    public function setUnaHistoriaClinica(?HistoriaClinica $unaHistoriaClinica): self
    {
        $this->unaHistoriaClinica = $unaHistoriaClinica;

        return $this;
    }
}
