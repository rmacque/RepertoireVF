<?php

namespace App\Controller;

use App\Entity\Comedien;
use App\Form\ComedienFormType;
use App\Repository\ComedienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comedien', name:'comedien_')]
class ComedienController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ComedienRepository $comedienRepository): Response
    {
        return $this->render('comedien/index.html.twig', [
            'comediens' => $comedienRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, ComedienRepository $comedienRepository): Response
    {
        $comedien = new Comedien();
        $form = $this->createForm(ComedienFormType::class, $comedien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comedienRepository->save($comedien, true);

            return $this->redirectToRoute('comedien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comedien/new.html.twig', [
            'comedien' => $comedien,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Comedien $comedien): Response
    {
        return $this->render('comedien/show.html.twig', [
            'comedien' => $comedien,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comedien $comedien, ComedienRepository $comedienRepository): Response
    {
        $form = $this->createForm(ComedienFormType::class, $comedien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comedienRepository->save($comedien, true);

            return $this->redirectToRoute('comedien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comedien/edit.html.twig', [
            'comedien' => $comedien,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Comedien $comedien, ComedienRepository $comedienRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comedien->getId(), $request->request->get('_token'))) {
            $comedienRepository->remove($comedien, true);
        }

        return $this->redirectToRoute('comedien_index', [], Response::HTTP_SEE_OTHER);
    }
}
