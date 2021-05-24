<?php


namespace App\Form;


use App\Entity\Card;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label'=>'Nom : ','attr'=> ['class'=>'form-control']])
            ->add('type',ChoiceType::class, [
                'choices' => [
                    'Electrique'=>'Electrique',
                    'Feu'=>'Feu',
                    'Métal'=>'Métal',
                    'Plante'=>'Plante',
                    'Psy'=>'Psy',
                    'Combat'=>'Combat',
                    'Eau'=>'Eau',
                    'Incolore'=>'Incolore',
                    'Obscurité'=>'Obscurité',
                    'Trainer'=>'Trainer'
                ],'attr'=> ['class'=>'form-control']
            ])
            ->add('state',ChoiceType::class, [
                'choices' => [
                    'Neuve'=>'Neuve',
                    'Presque neuve'=>'Presque neuve',
                    'Bon état'=>'Bon état',
                    'Jouée'=>'Jouée',
                    'Catastrophe'=>'Catastrophe'
                ],
                'label'=>'Etat : ',
                'attr'=> ['class'=>'form-control']
            ])
            ->add('rarity',ChoiceType::class, [
                'choices' => [
                    'Commune'=>'Commune',
                    'Peu commune'=>'Peu commune',
                    'Rare'=>'Rare',
                    'Très rare'=>'Très rare',
                ],
                'label'=>'Rareté : '
                ,'attr'=> ['class'=>'form-control']
            ])
            ->add('quantity',NumberType::class,['label'=>'Quantité : ','attr'=> ['class'=>'form-control']])
            ->add('numCard',NumberType::class,['label'=>'Numéro de la carte : ','attr'=> ['class'=>'form-control']])
            ->add('numSet',NumberType::class,['label'=>'Numéro du set : ','attr'=> ['class'=>'form-control']])
            ->add('imageFile',FileType::class,['label'=>'Photo : ','attr'=> ['class'=>'form-control']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'=>Card::class
            ]
        );
    }
}