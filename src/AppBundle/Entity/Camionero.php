<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Camionero
 *
 * @ORM\Table(name="Camionero")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LorryDriverRepository")
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
     * @var string
     * @Assert\Regex(
     *     pattern="/^\d{8}[a-zA-Z]$/",
     *     message="Tu DNI debe de ser válido"
     * )
     * @Assert\NotBlank()
     * @ORM\Column(name="dni", type="string", nullable=false)
     */
    private $dni;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="nombre_camionero", type="string", length=70, nullable=false)
     */
    public $nombreCamionero;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="dirección", type="string", length=70, nullable=false)
     */
    private $direccion;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="teléfono", type="integer", length=9, nullable=false)
     */
    private $telefono;

    /**
     * var Camion
     * @ORM\OneToOne(targetEntity="Camion", mappedBy="camioneroHabitual")
     * @ORM\JoinColumn(nullable=true)
     */
    private $camionHabitual;

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
     * @param string $dni
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
     * @return string
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

    public function __toString()
    {
        return $this->nombreCamionero;
    }

    /**
     * Set camionHabitual
     *
     * @param \AppBundle\Entity\Camion $camionHabitual
     *
     * @return Camionero
     */
    public function setCamionHabitual(\AppBundle\Entity\Camion $camionHabitual = null)
    {
        $this->camionHabitual = $camionHabitual;

        return $this;
    }

    /**
     * Get camionHabitual
     *
     * @return \AppBundle\Entity\Camion
     */
    public function getCamionHabitual()
    {
        return $this->camionHabitual;
    }
}
