<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $nom = "max";





        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'myName' => $nom ,
        ]);
    }
}
