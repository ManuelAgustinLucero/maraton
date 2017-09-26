<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Sexo
 *
 * @ORM\Table(name="sexo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SexoRepository")
 */
class Sexo
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
     * @ORM\Column(name="sexo", type="string", length=255)
     */
    private $sexo;


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
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="sexo")
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
     * @return Sexo
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
}
