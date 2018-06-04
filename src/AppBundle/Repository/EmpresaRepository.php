<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class EmpresaRepository extends EntityRepository
{
    public function findAllClientes() {
        $clientes = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.esempresadetransporte = false');

        return $clientes;
    }

    public function findAlltCompanies() {
        $companies = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.esempresadetransporte = true')
            ->getQuery()
            ->getResult();

        return $companies;
    }

    public function findAlltCompaniesType() {
        $companies = $this->createQueryBuilder('c')
            ->where('c.esempresadetransporte = true');
        return $companies;
    }
    public function findAlltClientsType() {
        $companies = $this->createQueryBuilder('c')
            ->where('c.esempresadetransporte = false');
        return $companies;
    }
}