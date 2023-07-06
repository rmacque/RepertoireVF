<?php

namespace App\Controller;

use App\Repository\ComedienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function index(ComedienRepository $comedienRepository): Response
    {
        $comediens = $comedienRepository->findLastEntries();
        return $this->render('general/index.html.twig', [
            'controller_name' => 'GeneralController',
            'comediens' => $comediens,
        ]);
    }

    public function navbarCreate(): Response
    {
        $navbar = "<ul class=\"navbar\">";
        $navRoutes = [
            "Accueil" => "acceuil",
            "Comédiens" => "comedien_index",
            "Oeuvres" => "oeuvre_index",
        ];
        foreach($navRoutes as $nomRoute => $route){
            $navbar .= "<li><a href=".$this->generateUrl($route).">$nomRoute</a></li>";
        }
        $navbar .= "</ul>";
        return new Response($navbar);
    }
}
