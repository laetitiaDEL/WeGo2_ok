<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Tableau vide qui va stocker les utilisateurs que je génère
        $users = [];
        $faker = Faker\Factory::create();
        //Boucle qui va itérer 20 utilisateurs factices
        for($i=0; $i<20; $i++){
            $user = new Users();
            //génération d'un utilisateur factice
            $user->setName($faker->name());
            $user->setMail($faker->email());
            $user->setPassword($faker->password());
            //stockage dans le manager
            $manager->persist($user);
            $users[] = $user;
        }

        $manager->flush();
    }
}
