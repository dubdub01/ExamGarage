<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Image;
use App\Entity\Voiture;
use Faker\Provider\Fakecar;
use App\DataFixtures\VoitureFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker2 = (new \Faker\Factory())::create();

        $faker2->addProvider(new Fakecar($faker2));
        {

        






            for($i = 1;$i<=10; $i++){

                $voiture = new Voiture();
                $cover = $faker->imageUrl(1000,350);
                $modele = $faker2->vehicleModel;
                $marque = $faker2 ->vehicleBrand;
                $carbu = $faker2 ->vehicleFuelType;




                $voiture->setMarque($marque)
                    ->setModele($modele)
                    ->setCylindree(rand(1,6))
                    ->setPuissance(rand(80,420))
                    ->setCarburant($carbu)
                    ->setAnnee(rand(1960,2021))
                    ->setTransmission("testtransmission")
                    ->setPrix(rand(2500,99000))
                    ->setNbrProprio(rand(1,4))
                    ->setKm(rand(12000,800000))
                    ->setDescription("testdescription")
                    ->setOptions("testoptions")
                    ->setCover($cover);
                
                for($j = 1;$j<=rand(2,5); $j++){
        
                    $image = new Image();
                    
                    $image->setVoiture($voiture)
                            ->setImage("https://picsum.photos/200/200")
                            ->setCaption("testcaption");
                        
                    
                    $manager->persist($image);
                }

                $manager->persist($voiture);
                }
        }

    
        $manager->flush();
    }
}
