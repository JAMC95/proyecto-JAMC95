<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class ObraRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $obra = $this->createQueryBuilder('e')
            ->select('e');

        return $obra;
    }

}