<?php

namespace App\Entity;

use App\Repository\EstadoClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadoClienteRepository::class)
 */
class EstadoCliente
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
     * @ORM\OneToMany(targetEntity=Cliente::class, mappedBy="unEstado")
     */
    private $unosClientes;

    public function __construct()
    {
        $this->unosClientes = new ArrayCollection();
    }

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

    /**
     * @return Collection|Cliente[]
     */
    public function getUnosClientes(): Collection
    {
        return $this->unosClientes;
    }

    public function addUnosCliente(Cliente $unosCliente): self
    {
        if (!$this->unosClientes->contains($unosCliente)) {
            $this->unosClientes[] = $unosCliente;
            $unosCliente->setUnEstado($this);
        }

        return $this;
    }

    public function removeUnosCliente(Cliente $unosCliente): self
    {
        if ($this->unosClientes->contains($unosCliente)) {
            $this->unosClientes->removeElement($unosCliente);
            // set the owning side to null (unless already changed)
            if ($unosCliente->getUnEstado() === $this) {
                $unosCliente->setUnEstado(null);
            }
        }

        return $this;
    }
}
