<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class MaterialRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
            $ticket = $this->createQueryBuilder('e')
            ->select('e');

        return $ticket;
    }

}