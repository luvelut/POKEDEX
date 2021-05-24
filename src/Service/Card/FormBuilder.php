<?php


namespace App\Service\Card;


use App\Entity\Card;
use App\Form\CardType;
use App\Form\Search\SearchCardType;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FormBuilder
{
    private $container;

    public function __construct(ContainerInterface $container){
        $this->container=$container;
    }

    public function getForm(){
        return $this->container->get('form.factory')->create(CardType::class);
    }

    public function getEditForm(Card $card){
        return $this->container->get('form.factory')->create(CardType::class,$card);
    }

    public function getSearchForm(){
        return $this->container->get('form.factory')->create(SearchCardType::class);
    }

}