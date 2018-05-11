<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camionero
 *
 * @ORM\Table(name="Camionero")
 * @ORM\Entity
 */
class Camionero
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
     * @var integer
     *
     * @ORM\Column(name="dni", type="integer", nullable=false)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_camionero", type="string", length=70, nullable=false)
     */
    private $nombreCamionero;

    /**
     * @var string
     *
     * @ORM\Column(name="dirección", type="string", length=70, nullable=false)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="teléfono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * var Camion
     * @ORM\ManyToOne(targetEntity="Camion", inversedBy="camionHabitual")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camioneroHabitual;


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
     * Set dni
     *
     * @param integer $dni
     *
     * @return Camionero
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return integer
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set nombreCamionero
     *
     * @param string $nombreCamionero
     *
     * @return Camionero
     */
    public function setNombreCamionero($nombreCamionero)
    {
        $this->nombreCamionero = $nombreCamionero;

        return $this;
    }

    /**
     * Get nombreCamionero
     *
     * @return string
     */
    public function getNombreCamionero()
    {
        return $this->nombreCamionero;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Camionero
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

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Camionero
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Camionero
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set camioneroHabitual
     *
     * @param \AppBundle\Entity\Camion $camioneroHabitual
     *
     * @return Camionero
     */
    public function setCamioneroHabitual(\AppBundle\Entity\Camion $camioneroHabitual)
    {
        $this->camioneroHabitual = $camioneroHabitual;

        return $this;
    }

    /**
     * Get camioneroHabitual
     *
     * @return \AppBundle\Entity\Camion
     */
    public function getCamioneroHabitual()
    {
        return $this->camioneroHabitual;
    }
}
