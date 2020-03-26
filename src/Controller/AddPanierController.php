<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddPanierController extends AbstractController
{
    /**
     * @Route("/add/panier", name="add_panier")
     */
    public function index()
    {
        return $this->render('add_panier/index.html.twig', [
            'controller_name' => 'AddPanierController',
        ]);
    }
}
