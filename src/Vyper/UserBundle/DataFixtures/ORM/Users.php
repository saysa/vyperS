<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 09/09/2014
 * Time: 07:15
 */

namespace Vyper\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vyper\UserBundle\Entity\User;


class Users extends AbstractFixture implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $names = array('kiyomi', 'saysa');

        foreach ($names as $i => $name)
        {
            $list[$i] = new User();
            $list[$i]->setUsername($name);
            $list[$i]->setPassword($name);
            $list[$i]->setFirst($name);
            $list[$i]->setLast($name);
            $list[$i]->setGender(true);
            $list[$i]->setBirthdate(new \DateTime('now'));
            $list[$i]->setAdmin(true);

            $list[$i]->setSalt('');
            $list[$i]->setRoles(array());

            $manager->persist($list[$i]);
        }

        $manager->flush();
    }

}