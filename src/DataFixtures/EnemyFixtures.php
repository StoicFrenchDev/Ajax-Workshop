<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Enemy;
use Faker\Factory;

class EnemyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $enemy1 = new Enemy();
        $enemy1->setFirstname("O-Ren");
        $enemy1->setLastname("Ishi");
        $enemy1->setLocation("Cotton Mouth");
        $enemy1->setIsAlive(true);
        $manager->persist($enemy1);

        $enemy2 = new Enemy();
        $enemy2->setFirstname("Vernita");
        $enemy2->setLastname("Green");
        $enemy2->setLocation("Copper Head");
        $enemy2->setIsAlive(true);
        $manager->persist($enemy2);

        $enemy3 = new Enemy();
        $enemy3->setFirstname("Budd");
        $enemy3->setLocation("Side Winder");
        $enemy3->setIsAlive(true);
        $manager->persist($enemy3);

        $enemy4 = new Enemy();
        $enemy4->setFirstname("Elle");
        $enemy4->setLastname("Driver");
        $enemy4->setLocation("California Mountain Snake");
        $enemy4->setIsAlive(true);
        $manager->persist($enemy4);

        $enemy5 = new Enemy();
        $enemy5->setFirstname("Bill");
        $enemy5->setIsAlive(true);
        $manager->persist($enemy5);


        for($i = 0; $i < 50; $i++) {
            $enemy6 = new Enemy();
            $enemy6->setFirstname($faker->firstName());
            $enemy6->setLastname($faker->lastName());
            $enemy6->setLocation($faker->city());
            $enemy6->setIsAlive(true);
            $manager->persist($enemy6);

        }

        $manager->flush();
    }

    
}
