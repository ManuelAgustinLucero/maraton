<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Ciudad
 *
 * @ORM\Table(name="ciudad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CiudadRepository")
 */
class Ciudad
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
     * @ORM\Column(name="codigopostal", type="string", length=255)
     */
    private $codigopostal;


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
     * @return Ciudad
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
     * Set codigopostal
     *
     * @param string $codigopostal
     *
     * @return Ciudad
     */
    public function setCodigopostal($codigopostal)
    {
        $this->codigopostal = $codigopostal;

        return $this;
    }

    /**
     * Get codigopostal
     *
     * @return string
     */
    public function getCodigopostal()
    {
        return $this->codigopostal;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="ciudades")
     * @ORM\JoinColumn(name="provincia_id", referencedColumnName="id")
     */
    private $provincia;

    /**
     * Set provincia
     *
     * @param \AppBundle\Entity\Provincia $provincia
     *
     * @return Ciudad
     */
    public function setProvincia(\AppBundle\Entity\Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return \AppBundle\Entity\Provincia
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="ciudad")
     */
    private $corredores;

    public function __construct()
    {
        $this->corredores = new ArrayCollection();
    }

    /**
     * Add corredore
     *
     * @param \AppBundle\Entity\Corredor $corredore
     *
     * @return Ciudad
     */
    public function addCorredore(\AppBundle\Entity\Corredor $corredore)
    {
        $this->corredores[] = $corredore;

        return $this;
    }

    /**
     * Remove corredore
     *
     * @param \AppBundle\Entity\Corredor $corredore
     */
    public function removeCorredore(\AppBundle\Entity\Corredor $corredore)
    {
        $this->corredores->removeElement($corredore);
    }

    /**
     * Get corredores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorredores()
    {
        return $this->corredores;
    }


    public function __toString(){
        return (string) $this->nombre;
    }
}
