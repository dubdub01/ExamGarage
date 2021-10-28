<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use App\DataFixtures\VoitureFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1;$i<=10; $i++){

            $voiture = new Voiture();
            
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
                ->setCover("testcover");
            
            $manager->persist($voiture);
        }
        $manager->flush();
    }
}
