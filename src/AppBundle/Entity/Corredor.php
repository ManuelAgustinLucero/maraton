<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corredor
 *
 * @ORM\Table(name="corredor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CorredorRepository")
 */
class Corredor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=255, nullable=true, unique=true)
     */
    private $dni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_emergencia", type="string", length=255)
     */
    private $telEmergencia;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Corredor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Corredor
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Corredor
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Corredor
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Corredor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Corredor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set telEmergencia
     *
     * @param string $telEmergencia
     *
     * @return Corredor
     */
    public function setTelEmergencia($telEmergencia)
    {
        $this->telEmergencia = $telEmergencia;

        return $this;
    }

    /**
     * Get telEmergencia
     *
     * @return string
     */
    public function getTelEmergencia()
    {
        return $this->telEmergencia;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Paises", inversedBy="corredores")
     * @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     */
    private $pais;

    /**
     * Set pais
     *
     * @param \AppBundle\Entity\Paises $pais
     *
     * @return Corredor
     */
    public function setPais(\AppBundle\Entity\Paises $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \AppBundle\Entity\Paises
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="corredores")
     * @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")
     */
    private $ciudad;

    /**
     * Set ciudad
     *
     * @param \AppBundle\Entity\Ciudad $ciudad
     *
     * @return Corredor
     */
    public function setCiudad(\AppBundle\Entity\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \AppBundle\Entity\Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Talle", inversedBy="corredores")
     * @ORM\JoinColumn(name="talle_id", referencedColumnName="id")
     */
    private $talle;

    /**
     * Set talle
     *
     * @param \AppBundle\Entity\Talle $talle
     *
     * @return Corredor
     */
    public function setTalle(\AppBundle\Entity\Talle $talle = null)
    {
        $this->talle = $talle;

        return $this;
    }

    /**
     * Get talle
     *
     * @return \AppBundle\Entity\Talle
     */
    public function getTalle()
    {
        return $this->talle;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Sexo", inversedBy="corredores")
     * @ORM\JoinColumn(name="sexo_id", referencedColumnName="id")
     */
    private $sexo;


    /**
     * Set sexo
     *
     * @param \AppBundle\Entity\Sexo $sexo
     *
     * @return Corredor
     */
    public function setSexo(\AppBundle\Entity\Sexo $sexo = null)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return \AppBundle\Entity\Sexo
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Distancia", inversedBy="corredores")
     * @ORM\JoinColumn(name="distancia_id", referencedColumnName="id")
     */
    private $distancia;

    /**
     * Set distancia
     *
     * @param \AppBundle\Entity\Distancia $distancia
     *
     * @return Corredor
     */
    public function setDistancia(\AppBundle\Entity\Distancia $distancia = null)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Get distancia
     *
     * @return \AppBundle\Entity\Distancia
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * @ORM\ManyToOne(targetEntity="TipoCarrera", inversedBy="corredores")
     * @ORM\JoinColumn(name="tipocarrera_id", referencedColumnName="id")
     */
    private $tipocarrera;

    /**
     * Set tipocarrera
     *
     * @param \AppBundle\Entity\TipoCarrera $tipocarrera
     *
     * @return Corredor
     */
    public function setTipocarrera(\AppBundle\Entity\TipoCarrera $tipocarrera = null)
    {
        $this->tipocarrera = $tipocarrera;

        return $this;
    }

    /**
     * Get tipocarrera
     *
     * @return \AppBundle\Entity\TipoCarrera
     */
    public function getTipocarrera()
    {
        return $this->tipocarrera;
    }

    /**
     * @ORM\ManyToOne(targetEntity="FormaPago", inversedBy="corredores")
     * @ORM\JoinColumn(name="formapago_id", referencedColumnName="id")
     */
    private $formapago;

    /**
     * Set formapago
     *
     * @param \AppBundle\Entity\FormaPago $formapago
     *
     * @return Corredor
     */
    public function setFormapago(\AppBundle\Entity\FormaPago $formapago = null)
    {
        $this->formapago = $formapago;

        return $this;
    }

    /**
     * Get formapago
     *
     * @return \AppBundle\Entity\FormaPago
     */
    public function getFormapago()
    {
        return $this->formapago;
    }
}
