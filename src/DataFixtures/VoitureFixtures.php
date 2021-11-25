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
        $faker2 =  Factory::create();

        $faker2->addProvider(new Fakecar($faker2));
     

        $images = [
            "https://www.autoaubaine.com/actualite-automobile/images-automobiles/54859.jpg",
            "https://cdn-s-www.ledauphine.com/images/397F90AD-4DB0-4349-9793-7E8041DC24DD/NW_raw/la-ferrari-roma-est-peut-etre-la-plus-belle-voiture-de-l-annee-1609263749.jpg",
            "https://i.pinimg.com/originals/84/a3/17/84a317acbdd5fca1c3b80ea30d45c370.jpg",
            "https://www.challenges.fr/assets/img/2019/09/04/cover-r4x3w1000-5d6f9e44cf5c8-07-ss300p-ehra-lessien.jpg",
            "https://cdn.motor1.com/images/mgl/GqV7Z/s3/essai-alpine-a110.jpg",
            "https://www.turbo.fr/sites/default/files/styles/slideshow_images/public/2020-05/Jaguar%20F-Type.jpg?itok=qUv84p7n",
            "https://www.turbo.fr/sites/default/files/styles/slideshow_images/public/slideshow/slides/2020-05/5eb12c6b5478a.jpg?itok=unpEX5oV",
            "https://images.frandroid.com/wp-content/uploads/2018/11/audi-etron-gt-5.jpg",
            "https://eromi.xyz/wp-content/uploads/2019/10/voiture-puissante.jpg",
            "https://sf2.autoplus.fr/wp-content/uploads/autoplus/2018/10/apollo-intensa-emozione-toutes-vendues.jpg",
            "https://actu-moteurs.com/wp-content/uploads/2020/03/HP-e1583162469250.jpg",
        ];

        

            for($i = 0;$i<10; $i++){

                $voiture = new Voiture();
                $cover = $images[$i+1];
                $modele = $faker2->vehicleModel;
                $marque = $faker2->vehicleBrand;
                $carbu = $faker2->vehicleFuelType;




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
       

    
        $manager->flush();
    }
}
