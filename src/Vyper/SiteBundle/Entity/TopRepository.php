<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TopRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TopRepository extends EntityRepository
{
    public function topManga()
    {
        $queryBuilder = $this->createQueryBuilder('t');
        $queryBuilder
            ->where('t.type = :manga')
            ->orderBy('t.position', 'ASC')
            ->setParameter('manga', 'manga')
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }

    public function getManga($options)
    {
        $queryBuilder = $this->createQueryBuilder('t');
        $queryBuilder
            ->where('t.type = :type')
            ->andWhere('t.position = :position')
            ->setParameter('type', 'manga')
            ->setParameter('position', $options['position'])
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
