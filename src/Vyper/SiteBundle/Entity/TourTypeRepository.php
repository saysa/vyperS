<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TourTypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TourTypeRepository extends EntityRepository
{
    public function myFindAll()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->where('p.deleted = false');
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
