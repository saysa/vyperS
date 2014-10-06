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

    public function getByArtist($artist_id)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder
            ->join('a.artists', 'artist', 'WITH', 'artist.id = :id')
            ->where('a.deleted = false')
            ->orderBy('a.date', 'DESC')
            ->setMaxResults(3)
            ->setParameter('id', $artist_id);
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
