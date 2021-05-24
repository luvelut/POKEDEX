<?php


namespace App\Controller\Front;


use App\Entity\Card;
use App\Service\Card\FormBuilder;
use App\Service\Card\FormHandler;
use App\Service\Card\SearchProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front_list")
     * @param SearchProvider $provider
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @param FormHandler $formHandler
     * @return Response
     */
    public function list(SearchProvider $provider,FormBuilder $formBuilder,Request $request,FormHandler $formHandler):Response {
        $form=$formBuilder->getSearchForm();

        $search = $formHandler->handleSearchForm($request,$form);
        dump($search);
        return $this->render('front/list.html.twig',
        [
            'form'=>$form->createView(),
            'cards' => $provider->getSearchCards($search)
        ]);
    }

    /**
     * @Route("/details/{id}", name="front_show")
     * @return Response
     */
    public function show(SearchProvider $provider,Card $card):Response {
        return $this->render('front/show.html.twig',
            [
                'card' => $provider->getCard($card)
            ]);
    }
}