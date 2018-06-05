<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class LorryRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $clientes = $this->createQueryBuilder('e')
            ->select('e')
            ->join('e.camioneroHabitual', 'ch')
            ->join('e.empresaTransportes', 'em');

        return $clientes;
    }

}