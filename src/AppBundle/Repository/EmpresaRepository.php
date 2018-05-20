<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class EmpresaRepository extends EntityRepository
{
    public function findAllClientes() {
        $clientes = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.esempresadetransporte = false')
            ->getQuery()
            ->getResult();

        return $clientes;
    }
}