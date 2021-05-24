<?php


namespace App\Form\Search;


use App\Entity\Card;
use App\Model\Search\CardSearch;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label'=>'Nom : ','required'=>false])
            ->add('type',ChoiceType::class, [
                'label'=>'Type : ',
                'required'=>false,
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
                ]
            ])
            ->add('set',TextType::class,['label'=>'Set: ','required'=>false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'=>CardSearch::class
            ]
        );
    }

}