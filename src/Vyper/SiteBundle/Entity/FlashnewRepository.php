<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FlashnewRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FlashnewRepository extends EntityRepository
{
    public function tickerList()
    {
        $queryBuilder = $this->createQueryBuilder('f');
        $queryBuilder
            ->where('f.deleted = false')
            ->orderBy('f.created', 'DESC')
            ->setMaxResults(10)
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
