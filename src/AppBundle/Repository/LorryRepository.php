<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class LorryRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $clientes = $this->createQueryBuilder('e')
            ->select('e')
            ->leftJoin('e.camioneroHabitual', 'ch')
            ->leftJoin('e.empresaTransportes', 'em');

        return $clientes;
    }

}