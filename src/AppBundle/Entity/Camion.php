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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->camionHabitual = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set matricula
     *
     * @param string $matricula
     *
     * @return Camion
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set matriculaRemolque
     *
     * @param string $matriculaRemolque
     *
     * @return Camion
     */
    public function setMatriculaRemolque($matriculaRemolque)
    {
        $this->matriculaRemolque = $matriculaRemolque;

        return $this;
    }

    /**
     * Get matriculaRemolque
     *
     * @return string
     */
    public function getMatriculaRemolque()
    {
        return $this->matriculaRemolque;
    }

    /**
     * Set tara
     *
     * @param integer $tara
     *
     * @return Camion
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
     * Add camionHabitual
     *
     * @param \AppBundle\Entity\Camionero $camionHabitual
     *
     * @return Camion
     */
    public function addCamionHabitual(\AppBundle\Entity\Camionero $camionHabitual)
    {
        $this->camionHabitual[] = $camionHabitual;

        return $this;
    }

    /**
     * Remove camionHabitual
     *
     * @param \AppBundle\Entity\Camionero $camionHabitual
     */
    public function removeCamionHabitual(\AppBundle\Entity\Camionero $camionHabitual)
    {
        $this->camionHabitual->removeElement($camionHabitual);
    }

    /**
     * Get camionHabitual
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCamionHabitual()
    {
        return $this->camionHabitual;
    }

    /**
     * Set empresaTransportes
     *
     * @param \AppBundle\Entity\Empresa $empresaTransportes
     *
     * @return Camion
     */
    public function setEmpresaTransportes(\AppBundle\Entity\Empresa $empresaTransportes)
    {
        $this->empresaTransportes = $empresaTransportes;

        return $this;
    }

    /**
     * Get empresaTransportes
     *
     * @return \AppBundle\Entity\Empresa
     */
    public function getEmpresaTransportes()
    {
        return $this->empresaTransportes;
    }
}
