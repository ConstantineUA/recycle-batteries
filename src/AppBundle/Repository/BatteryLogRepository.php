<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Custom repository for BatteryLog entity
 */
class BatteryLogRepository extends EntityRepository
{
    /**
     * Return aggregated count of batteries in the system
     * groupped by type
     *
     * @return array
     */
    public function findAggregatedCountGroupedByType()
    {
        $qb = $this->createQueryBuilder('r')
            ->select([
                'SUM(r.count) AS total', 'r.type',
            ])
            ->groupBy('r.type')
            ->orderBy('r.type');

        return $qb->getQuery()->getArrayResult();
    }
}
