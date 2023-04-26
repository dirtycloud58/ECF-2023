<?php

namespace App\Controller;

use App\Repository\HourRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PolitiquesController extends AbstractController
{
    #[Route('/politiques', name: 'app_politiques')]
    public function index(HourRepository $hourRepository): Response
    {
        return $this->render('politiques/index.html.twig', [
            'controller_name' => 'PolitiquesController',
            'hours' => $hourRepository->findByHour(),
        ]);
    }
}
