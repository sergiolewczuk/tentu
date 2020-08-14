<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente implements UserInterface, \Serializable
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
    private $dni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $mayor;

   

    /**
     * @ORM\Column(type="boolean")
     */
    private $aceptacion;

    /**
     * @ORM\ManyToOne(targetEntity=EstadoCliente::class, inversedBy="unosClientes")
     */
    private $unEstado;

    /**
     * @ORM\ManyToOne(targetEntity=Rol::class, inversedBy="unosClientes")
     */
    private $rol;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, inversedBy="unCliente", cascade={"persist", "remove"})
     */
    private $unaFicha;

    /**
     * @ORM\ManyToOne(targetEntity=Genero::class)
     */
    private $unGenero;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaNacimiento;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getMayor(): ?bool
    {
        return $this->mayor;
    }

    public function setMayor(bool $mayor): self
    {
        $this->mayor = $mayor;

        return $this;
    }

   

    public function getAceptacion(): ?bool
    {
        return $this->aceptacion;
    }

    public function setAceptacion(bool $aceptacion): self
    {
        $this->aceptacion = $aceptacion;

        return $this;
    }

    public function getUnEstado(): ?EstadoCliente
    {
        return $this->unEstado;
    }

    public function setUnEstado(?EstadoCliente $unEstado): self
    {
        $this->unEstado = $unEstado;

        return $this;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

     /** @see \Serializable::serialize() */
     public function serialize()
     {
         return serialize(array(
             $this->id,
             $this->correo,
             $this->password,
             // see section on salt below
             // $this->salt,
         ));
     }
 
     /** @see \Serializable::unserialize() */
     public function unserialize($serialized)
     {
         list (
             $this->id,
             $this->correo,
             $this->password,
             // see section on salt below
             // $this->salt
         ) = unserialize($serialized, ['allowed_classes' => false]);
     }

     public function getRoles()
     {
         return array($this->getRol()->getRol());
     }
 
     public function eraseCredentials()
     {
     }

     public function getUsername()
     {
         return $this->correo;
     }

     public function getRol(): ?Rol
     {
         return $this->rol;
     }

     public function setRol(?Rol $rol): self
     {
         $this->rol = $rol;

         return $this;
     }

     public function getUnaFicha(): ?Ficha
     {
         return $this->unaFicha;
     }

     public function setUnaFicha(?Ficha $unaFicha): self
     {
         $this->unaFicha = $unaFicha;

         return $this;
     }

     public function getUnGenero(): ?Genero
     {
         return $this->unGenero;
     }

     public function setUnGenero(?Genero $unGenero): self
     {
         $this->unGenero = $unGenero;

         return $this;
     }

     public function getFechaNacimiento(): ?\DateTimeInterface
     {
         return $this->fechaNacimiento;
     }

     public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
     {
         $this->fechaNacimiento = $fechaNacimiento;

         return $this;
     }

     public function getFumador(){

        $aux = 'No';

        if($this->getUnaFicha()->getUnaInformacionConsulta()->getFumador() == true){
            $aux = 'Sí';
        }

        return $aux;
     }

     public function getBebedor(){

        $aux = 'No';

        if($this->getUnaFicha()->getUnaInformacionConsulta()->getAlcohol() == true){
            $aux = 'Sí';
        }

        return $aux;
     }

     public function getActividadFisica(){

        $aux = 'No';

        if($this->getUnaFicha()->getUnaHistoriaPersonal()->getActividadFisica() == true){
            $aux = 'Sí';
        }

        return $aux;
     }

     public function getPatologias(){

        $aux = ' ';

        foreach($this->getUnaFicha()->getUnaHistoriaClinica()->getUnasPatologia() as $patologia){
            $aux.= $patologia->getUnTipo()->getNombre() . ' - ' . $patologia->getAclaracion() . '; ';
        }

        return $aux;
     }

     public function getMedicamentos(){

        $aux = ' ';

        foreach($this->getUnaFicha()->getUnaHistoriaClinica()->getUnasMedicaciones() as $patologia){
            $aux.= $patologia->getNombre() . ' - ' . $patologia->getDosis() . '; ';
        }

        return $aux;
     }
   
}
