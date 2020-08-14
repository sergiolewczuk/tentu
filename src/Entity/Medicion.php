<?php

namespace App\Entity;

use App\Repository\MedicionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicionRepository::class)
 */
class Medicion
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
    private $altura;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $peso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pesoHabitual;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enAnios;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, mappedBy="unaMedicion", cascade={"persist", "remove"})
     */
    private $unaFicha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAltura(): ?string
    {
        return $this->altura;
    }

    public function setAltura(string $altura): self
    {
        $this->altura = $altura;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(string $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getPesoHabitual(): ?string
    {
        return $this->pesoHabitual;
    }

    public function setPesoHabitual(string $pesoHabitual): self
    {
        $this->pesoHabitual = $pesoHabitual;

        return $this;
    }

    public function getEnAnios(): ?string
    {
        return $this->enAnios;
    }

    public function setEnAnios(string $enAnios): self
    {
        $this->enAnios = $enAnios;

        return $this;
    }

    public function getUnaFicha(): ?Ficha
    {
        return $this->unaFicha;
    }

    public function setUnaFicha(?Ficha $unaFicha): self
    {
        $this->unaFicha = $unaFicha;

        // set (or unset) the owning side of the relation if necessary
        $newUnaMedicion = null === $unaFicha ? null : $this;
        if ($unaFicha->getUnaMedicion() !== $newUnaMedicion) {
            $unaFicha->setUnaMedicion($newUnaMedicion);
        }

        return $this;
    }
}
