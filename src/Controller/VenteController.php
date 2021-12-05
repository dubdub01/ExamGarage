<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\AnnonceType;
use App\Form\VoitureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * crée une annonce
     * @Route("/vente/new", name="vente_create")
     * @return void
     */
    public function create(Request $request,EntityManagerInterface $manager){

        $vente = new Voiture();
        $form=$this->createform(VoitureType::class,$vente);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            foreach($vente->getImages() as $image){
                $image->setVoiture($vente);
                $manager->persist($image);
            }
            $manager->persist($vente);
            $manager->flush();
            $this->addFlash(
                'success',
                "La voiture <strong>{$vente->getModele()}</strong> a bien été enregistrée! "
            );
            return $this->redirectToRoute('vente_show',[
                'id' => $vente->getId()
            ]);
        }


        return $this->render("vente/new.html.twig",[
            'form' => $form->createView()
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
