<?php

namespace App\Entity;

use App\Repository\HistoriaAlimentariaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoriaAlimentariaRepository::class)
 */
class HistoriaAlimentaria
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, mappedBy="unaHistoriaAlimentaria", cascade={"persist", "remove"})
     */
    private $unaFicha;

    /**
     * @ORM\ManyToOne(targetEntity=HoraDesayuno::class)
     */
    private $unaHoraDesayuno;

    /**
     * @ORM\ManyToOne(targetEntity=HoraAlmuerzo::class)
     */
    private $unaHoraAlmuerzo;

    /**
     * @ORM\ManyToOne(targetEntity=HoraMerienda::class)
     */
    private $unaHoraMerienda;

    /**
     * @ORM\ManyToOne(targetEntity=HoraCena::class)
     */
    private $unaHoraCena;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alimentoFavorito;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alimentoRechazado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alergiaIntolerancia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otrasAclaraiones;

    /**
     * @ORM\ManyToOne(targetEntity=Agua::class)
     */
    private $unAgua;

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
        $newUnaHistoriaAlimentaria = null === $unaFicha ? null : $this;
        if ($unaFicha->getUnaHistoriaAlimentaria() !== $newUnaHistoriaAlimentaria) {
            $unaFicha->setUnaHistoriaAlimentaria($newUnaHistoriaAlimentaria);
        }

        return $this;
    }

    public function getUnaHoraDesayuno(): ?HoraDesayuno
    {
        return $this->unaHoraDesayuno;
    }

    public function setUnaHoraDesayuno(?HoraDesayuno $unaHoraDesayuno): self
    {
        $this->unaHoraDesayuno = $unaHoraDesayuno;

        return $this;
    }

    public function getUnaHoraAlmuerzo(): ?HoraAlmuerzo
    {
        return $this->unaHoraAlmuerzo;
    }

    public function setUnaHoraAlmuerzo(?HoraAlmuerzo $unaHoraAlmuerzo): self
    {
        $this->unaHoraAlmuerzo = $unaHoraAlmuerzo;

        return $this;
    }

    public function getUnaHoraMerienda(): ?HoraMerienda
    {
        return $this->unaHoraMerienda;
    }

    public function setUnaHoraMerienda(?HoraMerienda $unaHoraMerienda): self
    {
        $this->unaHoraMerienda = $unaHoraMerienda;

        return $this;
    }

    public function getUnaHoraCena(): ?HoraCena
    {
        return $this->unaHoraCena;
    }

    public function setUnaHoraCena(?HoraCena $unaHoraCena): self
    {
        $this->unaHoraCena = $unaHoraCena;

        return $this;
    }

    public function getAlimentoFavorito(): ?string
    {
        return $this->alimentoFavorito;
    }

    public function setAlimentoFavorito(string $alimentoFavorito): self
    {
        $this->alimentoFavorito = $alimentoFavorito;

        return $this;
    }

    public function getAlimentoRechazado(): ?string
    {
        return $this->alimentoRechazado;
    }

    public function setAlimentoRechazado(?string $alimentoRechazado): self
    {
        $this->alimentoRechazado = $alimentoRechazado;

        return $this;
    }

    public function getAlergiaIntolerancia(): ?string
    {
        return $this->alergiaIntolerancia;
    }

    public function setAlergiaIntolerancia(?string $alergiaIntolerancia): self
    {
        $this->alergiaIntolerancia = $alergiaIntolerancia;

        return $this;
    }

    public function getOtrasAclaraiones(): ?string
    {
        return $this->otrasAclaraiones;
    }

    public function setOtrasAclaraiones(?string $otrasAclaraiones): self
    {
        $this->otrasAclaraiones = $otrasAclaraiones;

        return $this;
    }

    public function getUnAgua(): ?Agua
    {
        return $this->unAgua;
    }

    public function setUnAgua(?Agua $unAgua): self
    {
        $this->unAgua = $unAgua;

        return $this;
    }
}
