<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class LorryDriverRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $lorryDriver = $this->createQueryBuilder('e')
            ->select('e');

        return $lorryDriver;
    }

}