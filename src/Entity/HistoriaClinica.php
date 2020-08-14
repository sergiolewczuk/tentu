<?php

namespace App\Entity;

use App\Repository\HistoriaClinicaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoriaClinicaRepository::class)
 */
class HistoriaClinica
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, mappedBy="unaHistoriaClinica", cascade={"persist", "remove"})
     */
    private $unaFicha;

    /**
     * @ORM\OneToMany(targetEntity=Medicacion::class, mappedBy="unaHistoriaClinica")
     */
    private $unasMedicaciones;

    /**
     * @ORM\OneToMany(targetEntity=Patologia::class, mappedBy="unaHistoriaClinica")
     */
    private $unasPatologia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $antecedente;

    public function __construct()
    {
        $this->unasMedicaciones = new ArrayCollection();
        $this->unasPatologia = new ArrayCollection();
    }

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
        $newUnaHistoriaClinica = null === $unaFicha ? null : $this;
        if ($unaFicha->getUnaHistoriaClinica() !== $newUnaHistoriaClinica) {
            $unaFicha->setUnaHistoriaClinica($newUnaHistoriaClinica);
        }

        return $this;
    }

    /**
     * @return Collection|Medicacion[]
     */
    public function getUnasMedicaciones(): Collection
    {
        return $this->unasMedicaciones;
    }

    public function addUnasMedicacione(Medicacion $unasMedicacione): self
    {
        if (!$this->unasMedicaciones->contains($unasMedicacione)) {
            $this->unasMedicaciones[] = $unasMedicacione;
            $unasMedicacione->setUnaHistoriaClinica($this);
        }

        return $this;
    }

    public function removeUnasMedicacione(Medicacion $unasMedicacione): self
    {
        if ($this->unasMedicaciones->contains($unasMedicacione)) {
            $this->unasMedicaciones->removeElement($unasMedicacione);
            // set the owning side to null (unless already changed)
            if ($unasMedicacione->getUnaHistoriaClinica() === $this) {
                $unasMedicacione->setUnaHistoriaClinica(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Patologia[]
     */
    public function getUnasPatologia(): Collection
    {
        return $this->unasPatologia;
    }

    public function addUnasPatologium(Patologia $unasPatologium): self
    {
        if (!$this->unasPatologia->contains($unasPatologium)) {
            $this->unasPatologia[] = $unasPatologium;
            $unasPatologium->setUnaHistoriaClinica($this);
        }

        return $this;
    }

    public function removeUnasPatologium(Patologia $unasPatologium): self
    {
        if ($this->unasPatologia->contains($unasPatologium)) {
            $this->unasPatologia->removeElement($unasPatologium);
            // set the owning side to null (unless already changed)
            if ($unasPatologium->getUnaHistoriaClinica() === $this) {
                $unasPatologium->setUnaHistoriaClinica(null);
            }
        }

        return $this;
    }

    public function getAntecedente(): ?string
    {
        return $this->antecedente;
    }

    public function setAntecedente(?string $antecedente): self
    {
        $this->antecedente = $antecedente;

        return $this;
    }
}
