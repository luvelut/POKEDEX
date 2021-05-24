<?php

namespace App\DataFixtures;

use App\Entity\Card;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CardFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $carte1 = new Card();
        $carte1->setName('Anorith');
        $carte1->setImage('photo.jpg');
        $carte1->setNumCard(46);
        $carte1->setNumSet(146);
        $carte1->setQuantity(1);
        $carte1->setRarity('rond');
        $carte1->setState('good');
        $carte1->setType('Combat');
        $carte1->setExtension('tueur');
        $manager->persist($carte1);

        $carte2 = new Card();
        $carte2->setName('Axoloto');
        $carte2->setImage('photo.jpg');
        $carte2->setNumCard(79);
        $carte2->setNumSet(115);
        $carte2->setQuantity(1);
        $carte2->setRarity('rond');
        $carte2->setState('good');
        $carte2->setType('Combat');
        $carte2->setExtension('tueur');
        $manager->persist($carte2);

        $carte3 = new Card();
        $carte3->setName('Balbuto');
        $carte3->setImage('photo.jpg');
        $carte3->setNumCard(43);
        $carte3->setNumSet(106);
        $carte3->setQuantity(1);
        $carte3->setRarity('rond');
        $carte3->setState('good');
        $carte3->setType('Combat');
        $carte3->setExtension('tueur');
        $manager->persist($carte3);

        $user=new User();
        $user->setName('Benji');
        $user->setLogin('benji');
        $user->setPassword('6800');
        $manager->persist($user);

        $manager->flush();
    }
}
