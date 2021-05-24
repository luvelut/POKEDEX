<?php


namespace App\Service\Card;


use App\Entity\Card;
use App\Repository\CardRepository;
use Symfony\Component\Security\Core\Security;

class SearchProvider
{
    private $security;
    private $cardRepository;

    public function __construct(Security $security,CardRepository $cardRepository)
    {
        $this->security=$security;
        $this->cardRepository=$cardRepository;
    }

    public function getCards():array
    {
        return $this->cardRepository->searchCards();
    }

    public function getSearchCards($search):array
    {
        return $this->cardRepository->searchCards($search);
    }

    public function getCard($card):Card
    {
        return $this->cardRepository->findOneBy(['id'=>$card]);
    }

}