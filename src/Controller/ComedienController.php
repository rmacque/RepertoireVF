<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comedien', name: 'comedien')]
class ComedienController extends AbstractController
{
    #[Route('/', name: '')]
    public function index(): Response
    {
        return $this->render('comedien/index.html.twig', [
            'controller_name' => 'ComedienController',
        ]);
    }

    #[Route('', name: '')]
    public function inscritption(): Response
    {
        return $this->render('comedien/inscription.html.twig', [
            'controller_name' => 'ComedienController',
        ]);
    }

    #[Route('', name: '')]
    public function details(): Response
    {
        return $this->render('comedien/details.html.twig', [
            'controller_name' => 'ComedienController',
        ]);
    }
}
