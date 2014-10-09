<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{
    public function myFindAll()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->where('p.deleted = false');
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

    public function nextEvent()
    {
        $now = new \DateTime("now");

        $queryBuilder = $this->createQueryBuilder('e');
        $queryBuilder
            ->where('e.deleted = false')
            ->andWhere('e.date > :now')
            ->setMaxResults(1)
            ->setParameter('now', $now);
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
