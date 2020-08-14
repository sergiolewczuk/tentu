<?php

namespace App\Entity;

use App\Repository\InformacionConsultaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformacionConsultaRepository::class)
 */
class InformacionConsulta
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
    private $medio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expectativa;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fumador;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alcohol;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, mappedBy="unaInformacionConsulta", cascade={"persist", "remove"})
     */
    private $unaFicha;

    /**
     * @ORM\ManyToOne(targetEntity=MotivoConsulta::class)
     */
    private $unMotivoConsulta;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getMedio(): ?string
    {
        return $this->medio;
    }

    public function setMedio(string $medio): self
    {
        $this->medio = $medio;

        return $this;
    }

    public function getExpectativa(): ?string
    {
        return $this->expectativa;
    }

    public function setExpectativa(string $expectativa): self
    {
        $this->expectativa = $expectativa;

        return $this;
    }

    public function getFumador(): ?bool
    {
        return $this->fumador;
    }

    public function setFumador(bool $fumador): self
    {
        $this->fumador = $fumador;

        return $this;
    }

    public function getAlcohol(): ?bool
    {
        return $this->alcohol;
    }

    public function setAlcohol(bool $alcohol): self
    {
        $this->alcohol = $alcohol;

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
        $newUnaInformacionConsulta = null === $unaFicha ? null : $this;
        if ($unaFicha->getUnaInformacionConsulta() !== $newUnaInformacionConsulta) {
            $unaFicha->setUnaInformacionConsulta($newUnaInformacionConsulta);
        }

        return $this;
    }

    public function getUnMotivoConsulta(): ?MotivoConsulta
    {
        return $this->unMotivoConsulta;
    }

    public function setUnMotivoConsulta(?MotivoConsulta $unMotivoConsulta): self
    {
        $this->unMotivoConsulta = $unMotivoConsulta;

        return $this;
    }
}
