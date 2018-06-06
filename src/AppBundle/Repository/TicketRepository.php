<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Evento;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository
{
    public function findAllWithoutExecute() {
        $clientes = $this->createQueryBuilder('e')
            ->select('e')
            ->join('e.camion', 'c')
            ->join('e.empresaTransporte', 'em')
            ->join('e.camionero', 'cDriver')
            ->join('e.cliente', 'cli')
            ->join('e.material', 'm')
            ->join('e.obra', 'o');

        return $clientes;
    }

}