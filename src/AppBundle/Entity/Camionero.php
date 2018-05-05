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
     * @ORM\ManyToOne(targetEntity="Camión", inversedBy="camionHabitual")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camioneroHabitual;

}

