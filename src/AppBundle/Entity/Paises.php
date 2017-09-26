<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Paises
 *
 * @ORM\Table(name="paises")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaisesRepository")
 */
class Paises
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
     * @ORM\Column(name="iso", type="string", length=255)
     */
    private $iso;

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
     * Set iso
     *
     * @param string $iso
     *
     * @return Paises
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Paises
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
     * @ORM\OneToMany(targetEntity="Provincia", mappedBy="pais")
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="pais")
     */
    private $provincias;
    private $corredores;

    public function __construct()
    {
        $this->provincias = new ArrayCollection();
        $this->corredores = new ArrayCollection();
    }

    /**
     * Add provincia
     *
     * @param \AppBundle\Entity\Provincia $provincia
     *
     * @return Paises
     */
    public function addProvincia(\AppBundle\Entity\Provincia $provincia)
    {
        $this->provincias[] = $provincia;

        return $this;
    }

    /**
     * Remove provincia
     *
     * @param \AppBundle\Entity\Provincia $provincia
     */
    public function removeProvincia(\AppBundle\Entity\Provincia $provincia)
    {
        $this->provincias->removeElement($provincia);
    }

    /**
     * Get provincias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProvincias()
    {
        return $this->provincias;
    }

    public function __toString(){
        return (string) $this->nombre;
    }
}
