<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\CreateSortieType;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/sorties', name: 'sortie_')]
class SortieController extends AbstractController
{
    #[Route('/modifier', name: 'modifier')]
    public function update(SortieRepository $sortieRepository): Response
    {
        return $this->render('sorties/modifier.html.twig',);
    }

    #[Route('/creer', name: 'creer')]
    public function create(
        SortieRepository $sortieRepository,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        $sorties = new Sortie();

        $sortiesForm = $this->createForm(CreateSortieType::class, $sorties);
        $sortiesForm->handleRequest($request);

        if ($sortiesForm->isSubmitted() && $sortiesForm->isValid()) {

            $entityManager->persist($sorties);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('sorties/creer.html.twig', [
            'sortiesForm' => $sortiesForm->createView()
        ]);
    }

    #[Route('/annuler', name: 'annuler')]
    public function cancel(SortieRepository $sortieRepository): Response
    {
    }
}
