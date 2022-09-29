<?php

namespace App\Controller;

use App\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $Participant = new Participant();
        $ParticipantForm = $this->createForm(ParticipantType::class, $Participant);
        return $this->render('main/index.html.twig', ["ParticipantForm" => $ParticipantForm->createView()]);
    }
}