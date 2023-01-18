<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Destinataire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {

      
        //DESTINATAIRE

        $initialDestinataires=array(
            ["name"=>"Nourdine EL KASSIMI",
            "email"=>"nouredine.kassimi@calipso-assurances.fr"],
            ["name"=>"Resources humains",
            "email"=>"resourceshumains@calipso-assurances.fr"]
        );

        for ($i=0; $i < 2 ; $i++) { 
            $destinataire= new Destinataire();
            $destinataire->setDesNom($initialDestinataires[$i]["name"]);
            $destinataire->setDesEmail($initialDestinataires[$i]["email"]);
            $manager->persist($destinataire);
        }
        $manager->flush();
    }
}
