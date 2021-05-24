<?php


namespace App\Controller\Back;


use App\Entity\Card;
use App\Service\Card\FormBuilder;
use App\Service\Card\FormHandler;
use App\Service\Card\SearchProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/espace-admin/liste", name="back_list")
     * @param SearchProvider $provider
     * @return Response
     */
    public function list(SearchProvider $provider,Request $request,FormHandler $formHandler,FormBuilder $formBuilder):Response {
        $form=$formBuilder->getSearchForm();
        $search=$formHandler->handleSearchForm($request,$form);
        return $this->render('back/list.html.twig',
            [
                'cards' => $provider->getSearchCards($search),
                'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/espace-admin/creation", name="back_new")
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @param FormHandler $formHandler
     * @return Response
     */
    public function new(Request $request,FormBuilder $formBuilder,FormHandler $formHandler):Response {
        $form=$formBuilder->getForm();
        $formHandler->handleForm($request,$form);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash('success','La carte a bien été créée ! ');
            return $this->redirectToRoute('back_list');
        }

        return $this->render('back/new.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/espace-admin/suppression/{id}", name="back_delete")
     * @param Card $card
     * @param Request $request
     * @param FormHandler $formHandler
     * @return Response
     */
    public function delete(Card $card, Request $request,FormHandler $formHandler):Response {
        $form=$this->createFormBuilder($card)->getForm();
        $formHandler->handleDeleteForm($request,$form,$card);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash('success','La carte a bien été supprimée ! ');
            return $this->redirectToRoute('back_list');
        }

        return $this->render('back/delete.html.twig',
            [
                'card'=>$card,
                'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/espace-admin/modification/{id}", name="back_edit")
     * @param Card $card
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @param FormHandler $formHandler
     * @return Response
     */
    public function edit(Card $card, Request $request,FormBuilder $formBuilder,FormHandler $formHandler):Response {
        $form=$formBuilder->getEditForm($card);
        $formHandler->handleForm($request,$form);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash('success','La carte a bien été modifiée ! ');
            return $this->redirectToRoute('back_list');
        }

        return $this->render('back/edit.html.twig',
            [
                'card'=>$card,
                'form' => $form->createView()
            ]);
    }

}