<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\Client;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenue')
            ->add('valeur')
            ->add('id_client')
            ->add('id_produit')
            ->add('date_creation', null, [
                'widget' => 'single_text'
            ])
            ->add('date_modification', null, [
                'widget' => 'single_text'
            ])
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
'choice_label' => 'id',
            ])
            ->add('Client', EntityType::class, [
                'class' => Client::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
