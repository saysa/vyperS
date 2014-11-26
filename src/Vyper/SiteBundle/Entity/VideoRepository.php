<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VideoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VideoRepository extends EntityRepository
{
    public function myFindAll()
    {
        $queryBuilder = $this->createQueryBuilder('v');
        $queryBuilder->where('v.deleted = false');
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }

    public function last()
    {
        $queryBuilder = $this->createQueryBuilder('v');
        $queryBuilder
            ->where('v.deleted = false')
            ->orderBy('v.created', 'DESC')
            ->setMaxResults(1)
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }

    public function lastFive()
    {
        $queryBuilder = $this->createQueryBuilder('v');
        $queryBuilder
            ->where('v.deleted = false')
            ->orderBy('v.created', 'DESC')
            ->setMaxResults(5)
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
