<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ProfilType;
use App\Repository\ParticipantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'profil_')]

class ProfilController extends AbstractController
{

    #[Route('profil/afficher', name: 'afficher')]
    public function afficherProfil(ParticipantRepository $participantRepository): Response
    {

        $participant = $this->getUser();

        return $this->render('profil/profil.html.twig', ['participant' => $participant] );
    }

    #[Route('profil', name: 'modifier')]
    public function modifierProfile(ParticipantRepository $participantRepository): Response
    {
        $participant = $this->getUser();

        $profil = new Participant();

        $profilForm = $this->createForm(ProfilType::class, $profil);
        return $this->render('profil/modifier.html.twig', ["ParticipantForm" => $profilForm->createView()]);
    }
}