<?php

namespace App\Entity;

use App\Repository\PatologiaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatologiaRepository::class)
 */
class Patologia
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TipoPatologia::class)
     */
    private $unTipo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aclaracion;

    /**
     * @ORM\ManyToOne(targetEntity=HistoriaClinica::class, inversedBy="unasPatologia")
     */
    private $unaHistoriaClinica;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnTipo(): ?TipoPatologia
    {
        return $this->unTipo;
    }

    public function setUnTipo(?TipoPatologia $unTipo): self
    {
        $this->unTipo = $unTipo;

        return $this;
    }

    public function getAclaracion(): ?string
    {
        return $this->aclaracion;
    }

    public function setAclaracion(?string $aclaracion): self
    {
        $this->aclaracion = $aclaracion;

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
