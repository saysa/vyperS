<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 09/09/2014
 * Time: 07:15
 */

namespace Vyper\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vyper\SiteBundle\Entity\Artist;


class LoadArtist extends AbstractFixture implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $names = array(
            'Antoine',
            'Amelie',
            'Aurelie',
            'Anousack',
            'Arnaud',
            'Audrey',
            'Amaury',
            'Benoit',
            'Bruno',
            'Brigitte',
            'Bernard',
            'Bernd',
            'Broly',
            'Celine',
            'Cecile',
            'Emile',
            'Melanie',
            'Gazette',
            'Gerard',
            'Zao',
        );

        foreach ($names as $i => $name)
        {
            $rand = mt_rand(0, 5);

            $list[$i] = new Artist();
            $list[$i]->setName($name);
            $list[$i]->setProfile($name);
            $list[$i]->setKeywords($name);
            $list[$i]->setType($this->getReference('artist-type-'.$rand));

            $manager->persist($list[$i]);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}