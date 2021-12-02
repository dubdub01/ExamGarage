<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VenteController extends AbstractController
{
    /**
     * @Route("/vente", name="vente")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Voiture::class);
        $voiture = $repo->findAll();

        return $this->render('vente/index.html.twig', [
            'controller_name' => 'VenteController',
            'voiture' => $voiture

        ]);
    }



    /**
    * Affiche une annonce
    * @Route("/vente/{id}", name="vente_show")
    * @return Response
    */
    public function show($id, Voiture $vente)
    {


        return $this->render('vente/show.html.twig',[
            'voiture' => $vente
           
        ]);
    }



    
}
