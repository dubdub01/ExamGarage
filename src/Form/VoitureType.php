<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Form\ImageType;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class VoitureType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque',TextType::class, $this->getConfiguration('marque','la marque de la voiture'))
            ->add('modele')
            ->add('cylindree')
            ->add('puissance')
            ->add('carburant')
            ->add('annee')
            ->add('transmission')
            ->add('prix')
            ->add('nbrProprio')
            ->add('km')
            ->add('description')
            ->add('options')
            ->add('cover')
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
