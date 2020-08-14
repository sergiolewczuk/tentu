<?php

namespace App\Entity;

use App\Repository\FichaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichaRepository::class)
 */
class Ficha
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=InformacionConsulta::class, inversedBy="unaFicha", cascade={"persist", "remove"})
     */
    private $unaInformacionConsulta;

    /**
     * @ORM\OneToOne(targetEntity=Cliente::class, mappedBy="unaFicha", cascade={"persist", "remove"})
     */
    private $unCliente;

    /**
     * @ORM\OneToOne(targetEntity=HistoriaClinica::class, inversedBy="unaFicha", cascade={"persist", "remove"})
     */
    private $unaHistoriaClinica;

    /**
     * @ORM\OneToOne(targetEntity=HistoriaAlimentaria::class, inversedBy="unaFicha", cascade={"persist", "remove"})
     */
    private $unaHistoriaAlimentaria;

    /**
     * @ORM\OneToOne(targetEntity=HistoriaPersonal::class, inversedBy="unaFicha", cascade={"persist", "remove"})
     */
    private $unaHistoriaPersonal;

    /**
     * @ORM\OneToOne(targetEntity=Medicion::class, inversedBy="unaFicha", cascade={"persist", "remove"})
     */
    private $unaMedicion;

    /**
     * @ORM\ManyToOne(targetEntity=EstadoFicha::class)
     */
    private $unEstado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnaInformacionConsulta(): ?InformacionConsulta
    {
        return $this->unaInformacionConsulta;
    }

    public function setUnaInformacionConsulta(?InformacionConsulta $unaInformacionConsulta): self
    {
        $this->unaInformacionConsulta = $unaInformacionConsulta;

        return $this;
    }

    public function getUnCliente(): ?Cliente
    {
        return $this->unCliente;
    }

    public function setUnCliente(?Cliente $unCliente): self
    {
        $this->unCliente = $unCliente;

        // set (or unset) the owning side of the relation if necessary
        $newUnaFicha = null === $unCliente ? null : $this;
        if ($unCliente->getUnaFicha() !== $newUnaFicha) {
            $unCliente->setUnaFicha($newUnaFicha);
        }

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

    public function getUnaHistoriaAlimentaria(): ?HistoriaAlimentaria
    {
        return $this->unaHistoriaAlimentaria;
    }

    public function setUnaHistoriaAlimentaria(?HistoriaAlimentaria $unaHistoriaAlimentaria): self
    {
        $this->unaHistoriaAlimentaria = $unaHistoriaAlimentaria;

        return $this;
    }

    public function getUnaHistoriaPersonal(): ?HistoriaPersonal
    {
        return $this->unaHistoriaPersonal;
    }

    public function setUnaHistoriaPersonal(?HistoriaPersonal $unaHistoriaPersonal): self
    {
        $this->unaHistoriaPersonal = $unaHistoriaPersonal;

        return $this;
    }

    public function getUnaMedicion(): ?Medicion
    {
        return $this->unaMedicion;
    }

    public function setUnaMedicion(?Medicion $unaMedicion): self
    {
        $this->unaMedicion = $unaMedicion;

        return $this;
    }

    public function getUnEstado(): ?EstadoFicha
    {
        return $this->unEstado;
    }

    public function setUnEstado(?EstadoFicha $unEstado): self
    {
        $this->unEstado = $unEstado;

        return $this;
    }
}
