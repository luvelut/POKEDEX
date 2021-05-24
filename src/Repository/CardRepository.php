<?php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Card|null find($id, $lockMode = null, $lockVersion = null)
 * @method Card|null findOneBy(array $criteria, array $orderBy = null)
 * @method Card[]    findAll()
 * @method Card[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }


    public function searchCards($search)
    {
        $query = $this->createQueryBuilder('c');


        if($search->getName()!==null && !empty($search->getName())){
            dump($search->getName());
            $query=$query
                ->andWhere('c.name = :q')
                ->setParameter('q',$search->getName())
                ;
        }

        if($search->getSet()!==null && !empty($search->getSet())){
            dump($search->getSet());
            $query=$query
                ->andWhere('c.extension = :e')
                ->setParameter('e',$search->getSet())
                ->orderBy('c.numCard')
            ;
        }

        if($search->getType()!==null && !empty($search->getType())){
            dump($search->getType());
            $query=$query
                ->andWhere('c.type LIKE :t')
                ->setParameter('t',"%{$search->getType()}%")
            ;
        }

        return $query->getQuery()->getResult();
    }

}
