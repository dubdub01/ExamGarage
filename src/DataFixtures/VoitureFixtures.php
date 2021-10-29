<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Image;
use App\Entity\Voiture;
use App\DataFixtures\VoitureFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        {

        






            for($i = 1;$i<=10; $i++){

                $voiture = new Voiture();
                $cover = $faker->imageUrl
                (1000,350);


                $voiture->setMarque("testmarque")
                    ->setModele("testmodele")
                    ->setCylindree(rand(1,6))
                    ->setPuissance(rand(80,420))
                    ->setCarburant("testcarburant")
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
