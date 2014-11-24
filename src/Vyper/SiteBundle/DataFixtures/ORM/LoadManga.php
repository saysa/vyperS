<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 09/09/2014
 * Time: 07:15
 */

namespace Vyper\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vyper\SiteBundle\Entity\Manga;


class LoadManga extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $names = array(
            'Captain Tsubasa',
            'Naruto',
    'One Piece',
    'Dragonball',
    'Ranma 1/2',
    'Saint Seiya',
    'Hunter x Hunter',
    'City Hunter',
    'Sailor Moon',


        );

        $years = array(
            '2005',
            '2006',
            '2007',
            '2008',
            '2009',
            '2010',
            '2011',
            '2012',
            '2013',
            '2014',
        );

        for ($i=1;$i<=12;$i++) {
            $months[$i] = $i;
        }

        for ($i=1;$i<=28;$i++) {
            $days[$i] = $i;
        }


        foreach ($names as $i => $name)
        {
            $randPic = mt_rand(5, 8);
            $year = $years[array_rand($years)];
            $month = array_rand($months);
            $day = array_rand($days);
            $datetime = "$year-$month-$day";

            $list[$i] = new Manga();
            $list[$i]->setTitle($name);
            $list[$i]->setAnime(true);
            $list[$i]->setPublicationDate(new \DateTime($datetime));
            $list[$i]->setComplete(true);
            $list[$i]->setPicture($this->getReference('picture-'.$randPic));

            $manager->persist($list[$i]);
        }



        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}