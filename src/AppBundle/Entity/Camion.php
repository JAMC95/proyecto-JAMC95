<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camión
 *
 * @ORM\Table(name="Camion")
 * @ORM\Entity
 */
class Camion
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
     * @ORM\Column(name="matrícula", type="string", length=7, nullable=false)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="matricula_remolque", type="string", length=8, nullable=false)
     */
    private $matriculaRemolque;

    /**
     * @var integer
     *
     * @ORM\Column(name="tara", type="integer", nullable=false)
     */
    private $tara;
    /**
     * var Camionero
     * @ORM\OneToMany(targetEntity="Camionero", mappedBy="camioneroHabitual")
     * @ORM\JoinColumn(nullable=true)
     */
    private $camionHabitual;

    /**
     * var Empresa
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="camiones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresaTransportes;

}

