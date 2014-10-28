<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
    public function myFindAll()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->where('a.deleted = false');
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }

    public function carousel()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder
            ->where('a.deleted = false')
            ->andWhere('a.highlight = true')
            ->orderBy('a.releaseDate', 'DESC')
            ->setMaxResults(8)
        ;

        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }

    public function showRecentArticles($limit = 10)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder
            ->where('a.deleted = false')
            ->orderBy('a.releaseDate', 'DESC')
            ->setMaxResults($limit)
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }

    public function latestNews($type)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder
            ->where('a.deleted = false')
            ->andWhere('a.articleType = :type')
            ->orderBy('a.releaseDate', 'DESC')
            ->setMaxResults(5)
            ->setParameter('type', $type)
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }


    public function showAll($posts_per_page, $page, $type)
    {
        if ($page < 1) {
            throw new \InvalidArgumentException('Can not be < 1');
        }

        $queryBuilder = $this->createQueryBuilder('a');

        $queryBuilder->where('a.deleted = false');
        if (!is_object($type[0])) {
            $w = '';

            foreach ($type as $k => $typeMusique) {
                if (!is_string($typeMusique)) {
                    if ($k == 1)
                        $w = ' a.articleType = :m' . $k . 'param';
                    else
                        $w.= ' OR a.articleType = :m' . $k . 'param';


                    $queryBuilder->setParameter('m' . $k . 'param', $typeMusique);
                    #echo "set Param $k et $typeMusique <br />";
                }
            }
            $queryBuilder->andWhere($w);
        } else {
            $queryBuilder->andWhere('a.articleType = :type')
                ->setParameter('type', $type);
        }


        $queryBuilder
            ->orderBy('a.releaseDate', 'DESC')

        ;
        $query = $queryBuilder->getQuery();


        $query
            ->setFirstResult(($page-1) * $posts_per_page)
            ->setMaxResults($posts_per_page)
        ;

        return new Paginator($query);
    }

    public function getByArtist($artist_id)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder
            ->join('a.artists', 'artist', 'WITH', 'artist.id = :id')
            ->where('a.deleted = false')
            ->orderBy('a.releaseDate', 'DESC')
            ->setMaxResults(3)
            ->setParameter('id', $artist_id);
        ;
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }


}
