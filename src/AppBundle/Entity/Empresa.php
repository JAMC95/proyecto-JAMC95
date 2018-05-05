<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="Empresa")
 * @ORM\Entity
 */
class Empresa
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
     * @ORM\Column(name="NIF", type="string", length=10, nullable=false)
     */
    private $nif;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre_empresa", type="integer", nullable=false)
     */
    private $nombreEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="dirección", type="string", length=50, nullable=false)
     */
    private $dirección;

    /**
     * @var integer
     *
     * @ORM\Column(name="teléfono", type="integer", nullable=false)
     */
    private $teléfono;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esEmpresaDeTransporte", type="boolean", nullable=false)
     */
    private $esempresadetransporte;
    /**
     * var Camión
     * @ORM\ManyToOne(targetEntity="Camión", inversedBy="camionHabitual")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camioneroHabitual;

    /**
     * var Obras[]
     * @ORM\ManyToMany(targetEntity="Obra")
     * @ORM\JoinColumn(nullable=true)
     */
    private $obras;
}

