<?php


namespace App\Service\Card;


use App\Entity\Card;
use App\Model\Search\CardSearch;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class FormHandler
{
    private $crudManager;
    private $container;
    private $entityManager;

    /**
     * FormHandler constructor.
     * @param CrudManager $crudManager
     * @param ContainerInterface $container
     */
    public function __construct(CrudManager $crudManager, ContainerInterface $container)
    {
        $this->crudManager = $crudManager;
        $this->container = $container;
        $this->entityManager = $this->container->get('doctrine')->getManager();
    }

    public function handleForm(Request $request,FormInterface $form)
    {
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $card=$form->getData();

            switch ($card->getNumSet())
            {
                //WIZARDS
                case 64 :
                    $card->setExtension('Neo révélation');
                    break;
                case 102 :
                    $card->setExtension('Pokemon trading card game');
                    break;
                case 64 :
                    $card->setExtension('Jungle');
                    break;
                case 62 :
                    $card->setExtension('Fossile');
                    break;
                case 130 :
                    $card->setExtension('Pokemon trading card game 2');
                    break;
                case 82 :
                    $card->setExtension('Team rocket');
                    break;
                case 132 :
                    $card->setExtension('Gym heroes');
                    break;
                case 111 :
                    $card->setExtension('Neo genesis');
                    break;
                case 75 :
                    $card->setExtension('Neo discovery');
                    break;
                case 105 :
                    $card->setExtension('Neo destiny');
                    break;
                case 110 :
                    $card->setExtension('Legendary collection');
                    break;
                case 147 :
                    $card->setExtension('Aquapolis');
                    break;
                case 144 :
                    $card->setExtension('Skyridge');
                    break;
                //EX
                case 109 :
                    $card->setExtension('Ex Rubis & Saphir');
                    break;
                case 100 :
                    $card->setExtension('Ex Tempête de sable');
                    break;
                case 97 :
                    $card->setExtension('Ex Dragon');
                    break;
                case 101 :
                    $card->setExtension('Ex Légendes oubliées');
                    break;
                case 112 :
                    $card->setExtension('Ex Rouge feu, vert feuille');
                    break;
                case 107 :
                    $card->setExtension('Ex Deoxys');
                    break;
                case 95 :
                    $card->setExtension('Ex Team magma VS team aqua');
                    break;
                case 106 :
                    $card->setExtension('Ex Emeraude');
                    break;
                case 115 :
                    $card->setExtension('Ex Forces cachées');
                    break;
                case 113 :
                    $card->setExtension('Ex Espèces delta');
                    break;
                case 92 :
                    $card->setExtension('Ex Créature de légende');
                    break;
                case 110 :
                    $card->setExtension('Ex Fantômes ???'); // ?????????????Hdon Holor
                    break;
                case 100 :
                    $card->setExtension('Ex Gardiens de cristal');
                    break;
                case 101 :
                    $card->setExtension('Ex Ile des dragons');
                    break;
                case 108 :
                    $card->setExtension('Ex Gardiens du pouvoir');
                    break;
                //P&G
                case 130 :
                    $card->setExtension('Diamant & perle');
                    break;
                case 123 :
                    $card->setExtension('Trésors mystérieux');
                    break;
                case 132 :
                    $card->setExtension('Merveilles secrètes');
                    break;
                case 106 :
                    $card->setExtension('Duels au sômmet');
                    break;
                case 100 :
                    $card->setExtension('Aube majestueuse');
                    break;
                case 146 :
                    $card->setExtension('Eveil des légendes');
                    break;
                case 100 :
                    $card->setExtension('Tempête');
                    break;
                //PLATINE
                case 127 :
                    $card->setExtension('Platine');
                    break;
                case 111 :
                    $card->setExtension('Rivaux ou Emergeants');
                    break;
                case 147 :
                    $card->setExtension('Vainqueurs suprêmes');
                    break;
                case 99 :
                    $card->setExtension('Arceurs'); //????????????????
                    break;
                //HG SS
                case 123 :
                    $card->setExtension('Heart gold soul silver');
                    break;
                case 95 :
                    $card->setExtension('Déchainement');
                    break;
                case 90 :
                    $card->setExtension('Indomptable');
                    break;
                case 102 :
                    $card->setExtension('Triomphe');
                    break;
                case 95 :
                    $card->setExtension('Appel des légendes');
                    break;
            }


            $this->entityManager->persist($card);
        }

        $this->crudManager->save();
    }

    public function handleDeleteForm(Request $request,FormInterface $form,Card $card)
    {
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->remove($card);
        }

        $this->crudManager->save();
    }

    public function handleSearchForm(Request $request,FormInterface $form)
    {
        $search = new CardSearch();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $search=$form->getData();
        }

        return $search;
    }

}