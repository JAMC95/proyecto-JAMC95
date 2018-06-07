<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
            $ticket = $this->createQueryBuilder('e')
            ->select('e')
            ->leftJoin('e.camion', 'c')
            ->leftJoin('e.empresaTransporte', 'em')
            ->leftJoin('e.camionero', 'cDriver')
            ->leftJoin('e.cliente', 'cli')
            ->leftJoin('e.material', 'm')
            ->leftJoin('e.obra', 'o');

        return $ticket;
    }

}