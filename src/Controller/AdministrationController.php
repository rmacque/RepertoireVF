<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/administration', name: 'administration')]
class AdministrationController extends AbstractController
{
    #[Route('', name: '')]
    public function index(): Response
    {
      $form = $this->createFormBuilder()
        ->add('mdp', PasswordType::class, ['label'=> 'mot de passe :', 'required' => true])
        ->add('submit', SubmitType::class, ['label'=> 'Connexion'])
        ->add('annuler', ResetType::class, ['label'=> 'Effacer'])
        ->getForm();


        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
            'form' => $form->createView(),
        ]);
    }
}
