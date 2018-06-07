<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class LorryRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $lorry = $this->createQueryBuilder('e')
            ->select('e')
            ->leftJoin('e.camioneroHabitual', 'ch')
            ->leftJoin('e.empresaTransportes', 'em');

        return $lorry;
    }

}