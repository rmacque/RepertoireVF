<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function index(): Response
    {
        return $this->render('general/index.html.twig', [
            'controller_name' => 'GeneralController',
        ]);
    }

    public function navbarCreate(): Response
    {
        $navbar = "<ul class=\"navbar\">";
        $navRoutes = [
            "Accueil" => "acceuil",
            "Comédiens" => "comedien_index",
            "Oeuvres" => "oeuvre_index",
            "Se connecter" => "register",
        ];
        foreach($navRoutes as $nomRoute => $route){
            $navbar .= "<li><a href=".$this->generateUrl($route).">$nomRoute</a></li>";
        }
        $navbar .= "</ul>";
        return new Response($navbar);
    }
}
