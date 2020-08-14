<?php

namespace App\Entity;

use App\Repository\HistoriaPersonalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoriaPersonalRepository::class)
 */
class HistoriaPersonal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, mappedBy="unaHistoriaPersonal", cascade={"persist", "remove"})
     */
    private $unaFicha;

    /**
     * @ORM\ManyToOne(targetEntity=FuncionIntestinal::class)
     */
    private $unaFuncionIntestinal;

    /**
     * @ORM\ManyToOne(targetEntity=Suenio::class)
     */
    private $unCiclo;

    

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $queActividad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cuandoCuantas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $actividadLaboral;

    /**
     * @ORM\ManyToOne(targetEntity=ActividadFisica::class)
     */
    private $unaActividadFisica;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnaFicha(): ?Ficha
    {
        return $this->unaFicha;
    }

    public function setUnaFicha(?Ficha $unaFicha): self
    {
        $this->unaFicha = $unaFicha;

        // set (or unset) the owning side of the relation if necessary
        $newUnaHistoriaPersonal = null === $unaFicha ? null : $this;
        if ($unaFicha->getUnaHistoriaPersonal() !== $newUnaHistoriaPersonal) {
            $unaFicha->setUnaHistoriaPersonal($newUnaHistoriaPersonal);
        }

        return $this;
    }

    public function getUnaFuncionIntestinal(): ?FuncionIntestinal
    {
        return $this->unaFuncionIntestinal;
    }

    public function setUnaFuncionIntestinal(?FuncionIntestinal $unaFuncionIntestinal): self
    {
        $this->unaFuncionIntestinal = $unaFuncionIntestinal;

        return $this;
    }

    public function getUnCiclo(): ?Suenio
    {
        return $this->unCiclo;
    }

    public function setUnCiclo(?Suenio $unCiclo): self
    {
        $this->unCiclo = $unCiclo;

        return $this;
    }

    

    public function getQueActividad(): ?string
    {
        return $this->queActividad;
    }

    public function setQueActividad(string $queActividad): self
    {
        $this->queActividad = $queActividad;

        return $this;
    }

    public function getCuandoCuantas(): ?string
    {
        return $this->cuandoCuantas;
    }

    public function setCuandoCuantas(?string $cuandoCuantas): self
    {
        $this->cuandoCuantas = $cuandoCuantas;

        return $this;
    }

    public function getActividadLaboral(): ?string
    {
        return $this->actividadLaboral;
    }

    public function setActividadLaboral(?string $actividadLaboral): self
    {
        $this->actividadLaboral = $actividadLaboral;

        return $this;
    }

    public function getUnaActividadFisica(): ?ActividadFisica
    {
        return $this->unaActividadFisica;
    }

    public function setUnaActividadFisica(?ActividadFisica $unaActividadFisica): self
    {
        $this->unaActividadFisica = $unaActividadFisica;

        return $this;
    }
}
