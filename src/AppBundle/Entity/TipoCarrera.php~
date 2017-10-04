<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * TipoCarrera
 *
 * @ORM\Table(name="tipo_carrera")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoCarreraRepository")
 */
class TipoCarrera
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
     * @return TipoCarrera
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
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="tipocarrera")
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
     * @return TipoCarrera
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
