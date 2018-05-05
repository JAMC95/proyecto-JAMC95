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

}

