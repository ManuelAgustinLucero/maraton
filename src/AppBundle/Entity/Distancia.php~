<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Distancia
 *
 * @ORM\Table(name="distancia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DistanciaRepository")
 */
class Distancia
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
     * @ORM\Column(name="distancia", type="string", length=255)
     */
    private $distancia;


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
     * Set distancia
     *
     * @param string $distancia
     *
     * @return Distancia
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Get distancia
     *
     * @return string
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="distancia")
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
     * @return Distancia
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
        return (string) $this->distancia;
    }
}
