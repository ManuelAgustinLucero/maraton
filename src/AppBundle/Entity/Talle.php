<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Talle
 *
 * @ORM\Table(name="talle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TalleRepository")
 */
class Talle
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
     * @ORM\Column(name="talle", type="string", length=255)
     */
    private $talle;


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
     * Set talle
     *
     * @param string $talle
     *
     * @return Talle
     */
    public function setTalle($talle)
    {
        $this->talle = $talle;

        return $this;
    }

    /**
     * Get talle
     *
     * @return string
     */
    public function getTalle()
    {
        return $this->talle;
    }

    /**
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="talle")
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
     * @return Talle
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
        return (string) $this->talle;
    }
}
