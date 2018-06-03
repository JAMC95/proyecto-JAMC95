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
     * @var bool
     *
     * @ORM\Column(name="tieneRecipiente", type="boolean", nullable=true)
     */
    private $tieneRecipiente;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadRecipiente", type="integer", nullable=true)
     */
    private $cantidadRecipiente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * var Camionero
     * @ORM\ManyToOne(targetEntity="Camionero")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camionero;

    /**
     * var Camion
     * @ORM\ManyToOne(targetEntity="Camion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camion;

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
     * Set tara
     *
     * @param integer $tara
     *
     * @return Ticket
     */
    public function setTara($tara)
    {
        $this->tara = $tara;

        return $this;
    }

    /**
     * Get tara
     *
     * @return integer
     */
    public function getTara()
    {
        return $this->tara;
    }

    /**
     * Set bruto
     *
     * @param integer $bruto
     *
     * @return Ticket
     */
    public function setBruto($bruto)
    {
        $this->bruto = $bruto;

        return $this;
    }

    /**
     * Get bruto
     *
     * @return integer
     */
    public function getBruto()
    {
        return $this->bruto;
    }

    /**
     * Set tieneRecipiente
     *
     * @param boolean $tieneRecipiente
     *
     * @return Ticket
     */
    public function setTieneRecipiente($tieneRecipiente)
    {
        $this->tieneRecipiente = $tieneRecipiente;

        return $this;
    }

    /**
     * Get tieneRecipiente
     *
     * @return boolean
     */
    public function getTieneRecipiente()
    {
        return $this->tieneRecipiente;
    }

    /**
     * Set cantidadRecipiente
     *
     * @param integer $cantidadRecipiente
     *
     * @return Ticket
     */
    public function setCantidadRecipiente($cantidadRecipiente)
    {
        $this->cantidadRecipiente = $cantidadRecipiente;

        return $this;
    }

    /**
     * Get cantidadRecipiente
     *
     * @return integer
     */
    public function getCantidadRecipiente()
    {
        return $this->cantidadRecipiente;
    }

    /**
     * Set camionero
     *
     * @param \AppBundle\Entity\Camionero $camionero
     *
     * @return Ticket
     */
    public function setCamionero(\AppBundle\Entity\Camionero $camionero)
    {
        $this->camionero = $camionero;

        return $this;
    }

    /**
     * Get camionero
     *
     * @return \AppBundle\Entity\Camionero
     */
    public function getCamionero()
    {
        return $this->camionero;
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Empresa $cliente
     *
     * @return Ticket
     */
    public function setCliente(\AppBundle\Entity\Empresa $cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Empresa
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set empresaTransporte
     *
     * @param \AppBundle\Entity\Empresa $empresaTransporte
     *
     * @return Ticket
     */
    public function setEmpresaTransporte(\AppBundle\Entity\Empresa $empresaTransporte)
    {
        $this->empresaTransporte = $empresaTransporte;

        return $this;
    }

    /**
     * Get empresaTransporte
     *
     * @return \AppBundle\Entity\Empresa
     */
    public function getEmpresaTransporte()
    {
        return $this->empresaTransporte;
    }

    /**
     * Set material
     *
     * @param \AppBundle\Entity\Material $material
     *
     * @return Ticket
     */
    public function setMaterial(\AppBundle\Entity\Material $material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return \AppBundle\Entity\Material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set obra
     *
     * @param \AppBundle\Entity\Obra $obra
     *
     * @return Ticket
     */
    public function setObra(\AppBundle\Entity\Obra $obra)
    {
        $this->obra = $obra;

        return $this;
    }

    /**
     * Get obra
     *
     * @return \AppBundle\Entity\Obra
     */
    public function getObra()
    {
        return $this->obra;
    }

    /**
     * Set tipoRecipiente
     *
     * @param \AppBundle\Entity\Recipiente $tipoRecipiente
     *
     * @return Ticket
     */
    public function setTipoRecipiente(\AppBundle\Entity\Recipiente $tipoRecipiente = null)
    {
        $this->tipoRecipiente = $tipoRecipiente;

        return $this;
    }

    /**
     * Get tipoRecipiente
     *
     * @return \AppBundle\Entity\Recipiente
     */
    public function getTipoRecipiente()
    {
        return $this->tipoRecipiente;
    }

    /**
     * @return mixed
     */
    public function getCamion()
    {
        return $this->camion;
    }

    /**
     * @param mixed $camion
     * @return Ticket
     */
    public function setCamion($camion)
    {
        $this->camion = $camion;
        return $this;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Ticket
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
