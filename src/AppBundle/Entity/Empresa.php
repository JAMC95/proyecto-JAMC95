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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->obras = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nif
     *
     * @param string $nif
     *
     * @return Empresa
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set nombreEmpresa
     *
     * @param integer $nombreEmpresa
     *
     * @return Empresa
     */
    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;

        return $this;
    }

    /**
     * Get nombreEmpresa
     *
     * @return integer
     */
    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }

    /**
     * Set dirección
     *
     * @param string $dirección
     *
     * @return Empresa
     */
    public function setDirección($dirección)
    {
        $this->dirección = $dirección;

        return $this;
    }

    /**
     * Get dirección
     *
     * @return string
     */
    public function getDirección()
    {
        return $this->dirección;
    }

    /**
     * Set teléfono
     *
     * @param integer $teléfono
     *
     * @return Empresa
     */
    public function setTeléfono($teléfono)
    {
        $this->teléfono = $teléfono;

        return $this;
    }

    /**
     * Get teléfono
     *
     * @return integer
     */
    public function getTeléfono()
    {
        return $this->teléfono;
    }

    /**
     * Set esempresadetransporte
     *
     * @param boolean $esempresadetransporte
     *
     * @return Empresa
     */
    public function setEsempresadetransporte($esempresadetransporte)
    {
        $this->esempresadetransporte = $esempresadetransporte;

        return $this;
    }

    /**
     * Get esempresadetransporte
     *
     * @return boolean
     */
    public function getEsempresadetransporte()
    {
        return $this->esempresadetransporte;
    }

    /**
     * Set camioneroHabitual
     *
     * @param \AppBundle\Entity\Camión $camioneroHabitual
     *
     * @return Empresa
     */
    public function setCamioneroHabitual(\AppBundle\Entity\Camión $camioneroHabitual)
    {
        $this->camioneroHabitual = $camioneroHabitual;

        return $this;
    }

    /**
     * Get camioneroHabitual
     *
     * @return \AppBundle\Entity\Camión
     */
    public function getCamioneroHabitual()
    {
        return $this->camioneroHabitual;
    }

    /**
     * Add obra
     *
     * @param \AppBundle\Entity\Obra $obra
     *
     * @return Empresa
     */
    public function addObra(\AppBundle\Entity\Obra $obra)
    {
        $this->obras[] = $obra;

        return $this;
    }

    /**
     * Remove obra
     *
     * @param \AppBundle\Entity\Obra $obra
     */
    public function removeObra(\AppBundle\Entity\Obra $obra)
    {
        $this->obras->removeElement($obra);
    }

    /**
     * Get obras
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObras()
    {
        return $this->obras;
    }
}
