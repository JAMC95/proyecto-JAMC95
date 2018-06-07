<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class LorryDriverRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $clientes = $this->createQueryBuilder('e')
            ->select('e');

        return $clientes;
    }

}