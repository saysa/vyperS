<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 02/10/2014
 * Time: 08:33
 */

namespace Vyper\SiteBundle\Components\VisitIncrement;

use Vyper\SiteBundle\Entity\Album;
use Vyper\SiteBundle\Entity\Article as Article;
use Vyper\SiteBundle\Entity\Artist;
use Vyper\SiteBundle\Entity\Disco;
use Vyper\SiteBundle\Entity\Event;
use Vyper\SiteBundle\Entity\Visit;

class VisitIncrement {

    public function increment($item, $em)
    {
        $options = array(
            'item' => $item,
            'ip'   => $_SERVER['REMOTE_ADDR'],
        );

        $visit = new Visit();
        $visit->setIp($_SERVER['REMOTE_ADDR']);
        $visit->setCreated(new \DateTime('now'));

        if ($item instanceof Article) {
            $visit->setArticle($item);
        } elseif ($item instanceof Event) {
            $visit->setEvent($item);
        } elseif ($item instanceof Artist) {
            $visit->setArtist($item);
        } elseif ($item instanceof Album) {
            $visit->setAlbum($item);
        } elseif ($item instanceof Disco) {
            $visit->setDisco($item);
        }

        $nbVisit  = $em->getRepository('VyperSiteBundle:Visit')->findVisit($options);

        if (sizeof($nbVisit) == 0) {
            $em->persist($visit);
            $em->flush();
        }
    }
} 