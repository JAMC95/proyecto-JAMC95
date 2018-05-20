<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="Empresa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmpresaRepository")
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
     * @var string
     *
     * @ORM\Column(name="nombre_empresa", type="string", nullable=false)
     */
    private $nombreEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=50, nullable=false)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esEmpresaDeTransporte", type="boolean", nullable=false)
     */
    private $esempresadetransporte;
    /**
     * var Camion
     * @ORM\OneToOne(targetEntity="Camion", inversedBy="empresaTransportes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $camionHabitual;

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
     * @param string $direccion
     *
     * @return Empresa
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get dirección
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set teléfono
     *
     * @param integer $telefono
     *
     * @return Empresa
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get teléfono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
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
     * @param \AppBundle\Entity\Camion $camionHabitual
     *
     * @return Empresa
     */
    public function setCamionHabitual(\AppBundle\Entity\Camion $camionHabitual)
    {
        $this->camionHabitual = $camionHabitual;

        return $this;
    }

    /**
     * Get camioneroHabitual
     *
     * @return \AppBundle\Entity\Camion
     */
    public function getCamionHabitual()
    {
        return $this->camionHabitual;
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
