<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="Ticket")
 * @ORM\Entity
 */
class Ticket
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
     * @ORM\Column(name="tara", type="integer", nullable=false)
     */
    private $tara;

    /**
     * @var integer
     *
     * @ORM\Column(name="bruto", type="integer", nullable=false)
     */
    private $bruto;

    /**
     * @var integer
     *
     * @ORM\Column(name="neto", type="integer", nullable=false)
     */
    private $neto;

    /**
     * @var bool
     *
     * @ORM\Column(name="tineRecipiente", type="boolean", nullable=true)
     */
    private $tieneRecipiente;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadRecipiente", type="integer", nullable=true)
     */
    private $cantidadRecipiente;

    /**
     * var Camionero
     * @ORM\ManyToOne(targetEntity="Camionero")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camionero;

    /**
     * var Empresa
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * var Empresa
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresaTransporte;

    /**
     * var Material
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(nullable=false)
     */
    private $material;

    /**
     * var Obra
     * @ORM\ManyToOne(targetEntity="Obra")
     * @ORM\JoinColumn(nullable=false)
     */
    private $obra;

    /**
     * var Recipiente
     * @ORM\ManyToOne(targetEntity="Recipiente")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tipoRecipiente;



}

