<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Voiture::class);
        $voitures = $repo->findAll();


        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
            'voitures' => $voitures
        ]);
    }
}
