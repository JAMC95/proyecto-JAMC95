<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="Recipiente", uniqueConstraints={@ORM\UniqueConstraint(name="tipo", columns={"tipo"})})
 * @ORM\Entity
 */
class Recipiente
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
     * @ORM\Column(name="cantidad", type="string", length=50, nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=50, nullable=false)
     */
    private $tipo;


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
     * Set cantidad
     *
     * @param string $cantidad
     *
     * @return Recipiente
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Recipiente
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
