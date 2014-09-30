<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DiscoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DiscoRepository extends EntityRepository
{
    public function myFindAll()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->where('a.deleted = false');
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
