<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;

class Seeder implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $finder = new Finder();
        $finder->in(__DIR__ . 'Sql/');
        $finder->name('*.sql');
        $finder->files();
        $finder->sortByName();

        foreach ($finder as $file) {
            print "Importing: {$file->getBasename()}" . PHP_EOL;
            $sql = $file->getContents();
            $manager->getConnection()->exec($sql);
            $manager->flush();
        }
    }
}
