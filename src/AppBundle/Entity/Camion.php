<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Camion
 * @ORM\Table(name="Camion")})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LorryRepository")
 * @UniqueEntity(fields={"matricula", "matriculaRemolque"}, message="No puede existir dos camiones con las dos matrículas iguales")
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
     * @Assert\Length(
     *      min = 7,
     *      max = 7,
     *      minMessage = "La matrícula debe de ser 7",
     *      maxMessage = "La matricula no puede ser mayor de 7"
     * )
     * @ORM\Column(name="matrícula", type="string", length=7, nullable=false)
     */
    private $matricula;
    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=17, nullable=false)
     */
    private $marca;
    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=17, nullable=false)
     */
    private $modelo;

    /**
     * @var string
     * @Assert\Length(
     *      min = 7,
     *      max = 8,
     *      minMessage = "La matrícula del remolque debe de ser mayor a 7",
     *      maxMessage = "La matricula del remolque no puede ser mayor de 8"
     * )
     * @ORM\Column(name="matricula_remolque", type="string",length=8, nullable=true)
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
     * @ORM\OneToOne(targetEntity="Camionero", inversedBy="camionHabitual")
     * @ORM\JoinColumn(nullable=true)
     */
    private $camioneroHabitual;

    /**
     * var Empresa
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="camionHabitual")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     * @Assert\NotBlank()
     */
    private $empresaTransportes;



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
     * Set camioneroHabitual
     *
     * @param \AppBundle\Entity\Camionero $camioneroHabitual
     *
     * @return Camion
     */
    public function setCamioneroHabitual(\AppBundle\Entity\Camionero $camioneroHabitual = null)
    {
        $this->camioneroHabitual = $camioneroHabitual;

        return $this;
    }

    /**
     * Get string
     *
     * @return string
     */
    public function getCamioneroHabitual()
    {
        return $this->camioneroHabitual;
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
     * Get string
     *
     * @return string
     */
    public function getEmpresaTransportes()
    {
        return $this->empresaTransportes;
    }

    public function __toString()
    {
        return $this->matricula;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Camion
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Camion
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
