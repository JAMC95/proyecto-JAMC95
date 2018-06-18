<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class EmpresaRepository extends EntityRepository
{
    public function findAllClientes() {
        $clientes = $this->createQueryBuilder('c')
            ->select('c');

        return $clientes;
    }

    public function findAlltCompanies() {
        $companies = $this->createQueryBuilder('e')
            ->select('e')
            ->where('e.esempresadetransporte = true');


        return $companies;
    }

    public function findAlltCompaniesType() {
        $companies = $this->createQueryBuilder('c')
            ->where('c.esempresadetransporte = true');
        return $companies;
    }
    public function findAlltClientsType() {
        $companies = $this->createQueryBuilder('c');
        return $companies;
    }
}