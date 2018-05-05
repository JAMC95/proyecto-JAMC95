<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obra
 *
 * @ORM\Table(name="Obra")
 * @ORM\Entity
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
     *
     * @ORM\Column(name="nombre_obra", type="string", length=50, nullable=false)
     */
    private $nombreObra;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono_encargado", type="integer", nullable=false)
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
}
