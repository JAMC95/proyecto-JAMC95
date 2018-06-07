<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Obra
 *
 * @ORM\Table(name="Obra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObraRepository")
 */
class Obra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="nombre_obra", type="string", length=50, nullable=false)
     */
    private $nombreObra;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="direccion", type="string", length=50, nullable=false)
     */
    private $direccion;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="telefono_encargado", type="integer", length=9, nullable=false)
     */
    private $telefonoEncargado;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreObra
     *
     * @param string $nombreObra
     *
     * @return Obra
     */
    public function setNombreObra($nombreObra)
    {
        $this->nombreObra = $nombreObra;

        return $this;
    }

    /**
     * Get nombreObra
     *
     * @return string
     */
    public function getNombreObra()
    {
        return $this->nombreObra;
    }

    /**
     * Set telefonoEncargado
     *
     * @param integer $telefonoEncargado
     *
     * @return Obra
     */
    public function setTelefonoEncargado($telefonoEncargado)
    {
        $this->telefonoEncargado = $telefonoEncargado;

        return $this;
    }

    /**
     * Get telefonoEncargado
     *
     * @return integer
     */
    public function getTelefonoEncargado()
    {
        return $this->telefonoEncargado;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Obra
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function __toString()
    {
       return $this->nombreObra;
    }


}
