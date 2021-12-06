<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Form\ImageType;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class VoitureType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', TextType::class, $this->getConfiguration("marque","marque de la voiture"))
            ->add('modele', TextType::class, $this->getConfiguration("modele","modele de la voiture"))
            ->add('cylindree', NumberType::class, $this->getConfiguration("cylindree","cylindrée de la voiture"))
            ->add('puissance', IntegerType::class, $this->getConfiguration("puissance","nombre de CV de la voiture"))
            ->add('carburant', TextType::class, $this->getConfiguration("carburant","carburant de la voiture"))
            ->add('annee', IntegerType::class, $this->getConfiguration("annee","date de la première immatriculation de la voiture"))
            ->add('transmission', TextType::class, $this->getConfiguration("transimission","type de transmission de la voiture"))
            ->add('prix', MoneyType::class, $this->getConfiguration("prix", "indiquer le prix de la voiture"))
            ->add('nbrProprio', IntegerType::class, $this->getConfiguration("nbrProprio","nombre de propriétaire précédent"))
            ->add('km', NumberType::class, $this->getConfiguration("km","kilométrage de la voiture"))
            ->add('description', TextareaType::class, $this->getConfiguration("description", "donnez une description de la voiture"))
            ->add('options', TextareaType::class, $this->getConfiguration("options", "listez les options de la voiture"))
            ->add('cover', UrlType::class, $this->getConfiguration("cover", "Donnez l'adresse de votre image"))
            ->add('images',CollectionType::class, [
                'entry_type'=>ImageType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
