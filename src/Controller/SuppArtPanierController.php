<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuppArtPanierController extends AbstractController
{
    /**
     * @Route("/supp/art/panier", name="supp_art_panier")
     */
    public function index()
    {
        return $this->render('supp_art_panier/index.html.twig', [
            'controller_name' => 'SuppArtPanierController',
        ]);
    }
}
