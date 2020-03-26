<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ArticlesRepository;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier/index", name="panier")
     */
    public function index(SessionInterface $session, ArticlesRepository $articlesRepository)
    {
        $panier = $session->get('panier', []);

        $panierEnrichi = [];

        foreach($panier as $id => $quantity)
        {
          $panierEnrichi[] = [
            'article' => $articlesRepository->find($id),
            'quantity' => $quantity
          ];
        }

        return $this->render('panier/index.html.twig', [
            'produits' => $panierEnrichi,
        ]);
    }


    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function add($id, SessionInterface $session)
    {

      $panier = $session->get('panier', []);

      if(!empty($panier[$id]))
      {
        $panier[$id]++;
      } else
      {
        $panier[$id] = 1;
      }

      $session->set('panier', $panier);

      dd($session->get('panier'));
    }
}
