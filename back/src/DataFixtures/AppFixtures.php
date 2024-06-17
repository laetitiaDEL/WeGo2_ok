<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Breed;
use App\Entity\Pet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Tableau vide qui va stocker les utilisateurs que je génère
        $users = [];
        $pets = [];
        $breeds = [];
        $faker = Faker\Factory::create('fr_FR');

        //Boucle qui va itérer 100 utilisateurs factices
        for($i=0; $i<100; $i++){
            $user = new User();
            //génération d'un utilisateur factice
            $user->setName($faker->name());
            $user->setEmail($faker->email());
            $user->setPassword($faker->password());
            $manager->persist($user);

            $this->setPets($user, $manager);

            //stockage dans le manager
            $manager->persist($user);
            $users[] = $user;
        }

        $manager->flush();
    }

    private function setPets(User $user, ObjectManager $manager){

        $faker = Faker\Factory::create('fr_FR');
        $nbPets = rand(0,5);
        for($i=0; $i<$nbPets; $i++){
            $pet = new Pet();
            //génération d'un animal factice
            $pet->setName($faker->firstname());
            $pet->setAge('2 ans');
            $user->addPet($pet);
            $pet->setOwner($user);

            $this->setBreed($pet, $manager);

            //stockage dans le manager
            $manager->persist($pet);
            $pets[] = $pet;
        }
    }

    private function setBreed(Pet $pet, ObjectManager $manager){

        $faker = Faker\Factory::create('fr_FR');

        $breed = new Breed();
        //génération d'une race factice
        $breed->setName($faker->jobTitle());
        $pet->setBreed($breed);

        //stockage dans le manager
        $manager->persist($breed);
        $breeds[] = $breed;
    }
}
