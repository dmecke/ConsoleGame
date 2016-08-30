<?php

namespace Cunningsoft\ConsoleGameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixturesData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/../../Resources/config/fixtures.yml', $manager);
    }
}
