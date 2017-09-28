<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Provincia
 *
 * @ORM\Table(name="provincia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvinciaRepository")
 */
class Provincia
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
     * @return Provincia
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
     * @ORM\ManyToOne(targetEntity="Paises", inversedBy="provincias")
     * @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     */
    private $pais;

    /**
     * Set pais
     *
     * @param \AppBundle\Entity\Paises $pais
     *
     * @return Provincia
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
     * @ORM\OneToMany(targetEntity="Ciudad", mappedBy="provincia")
     */
    private $ciudades;

    public function __construct()
    {
        $this->ciudades = new ArrayCollection();
    }

    /**
     * Add ciudade
     *
     * @param \AppBundle\Entity\Ciudad $ciudade
     *
     * @return Provincia
     */
    public function addCiudade(\AppBundle\Entity\Ciudad $ciudade)
    {
        $this->ciudades[] = $ciudade;

        return $this;
    }

    /**
     * Remove ciudade
     *
     * @param \AppBundle\Entity\Ciudad $ciudade
     */
    public function removeCiudade(\AppBundle\Entity\Ciudad $ciudade)
    {
        $this->ciudades->removeElement($ciudade);
    }

    /**
     * Get ciudades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }
    public function __toString(){
        return (string) $this->nombre;
    }
}
