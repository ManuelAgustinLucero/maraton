<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FormaPago
 *
 * @ORM\Table(name="forma_pago")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormaPagoRepository")
 */
class FormaPago
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
     * @ORM\Column(name="formapago", type="string", length=255)
     */
    private $formapago;


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
     * Set formapago
     *
     * @param string $formapago
     *
     * @return FormaPago
     */
    public function setFormapago($formapago)
    {
        $this->formapago = $formapago;

        return $this;
    }

    /**
     * Get formapago
     *
     * @return string
     */
    public function getFormapago()
    {
        return $this->formapago;
    }

    /**
     * @ORM\OneToMany(targetEntity="Corredor", mappedBy="formapago")
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
     * @return FormaPago
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
        return (string) $this->formapago;
    }
}
