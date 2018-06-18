<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Empresa
 *
 * @ORM\Table(name="Empresa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmpresaRepository")
 * @UniqueEntity(fields={"nif"}, message="No se puede repetir el DNI/NIF")
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
     * @Assert\NotBlank()
     * @ORM\Column(name="NIF", type="string", length=10, nullable=false)
     */
    private $nif;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="nombre_empresa", type="string", nullable=false)
     */
    private $nombreEmpresa;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="direccion", type="string", length=50, nullable=false)
     */
    private $direccion;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="telefono", type="integer", length=9, nullable=false)
     */
    private $telefono;

    /**
     * @var boolean
     * @ORM\Column(name="esEmpresaDeTransporte", type="boolean", nullable=false)
     */
    private $esempresadetransporte;
    /**
     * var Camion[]
     * @ORM\OneToMany(targetEntity="Camion", mappedBy="empresaTransportes")
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
     * @param string $nombreEmpresa
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
     * @return string
     */
    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }

    /**
     * Set direccion
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
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
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
     * Get telefono
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
     * Set camionHabitual
     *
     * @param \AppBundle\Entity\Camion $camionHabitual
     *
     * @return Empresa
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

    public function __toString()
    {
       return $this->nombreEmpresa;
    }



    /**
     * Add camionHabitual
     *
     * @param \AppBundle\Entity\Camion $camionHabitual
     *
     * @return Empresa
     */
    public function addCamionHabitual(\AppBundle\Entity\Camion $camionHabitual)
    {
        $this->camionHabitual[] = $camionHabitual;

        return $this;
    }

    /**
     * Remove camionHabitual
     *
     * @param \AppBundle\Entity\Camion $camionHabitual
     */
    public function removeCamionHabitual(\AppBundle\Entity\Camion $camionHabitual)
    {
        $this->camionHabitual->removeElement($camionHabitual);
    }
}
