<?php

namespace App\Controller;

use App\Repository\GaleryRepository;
use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(GaleryRepository $galeryRepository, HourRepository $hourRepository): Response
    {


        return $this->render('home/index.html.twig', [
            'galerys' => $galeryRepository->findByGalery(),
            'hours' => $hourRepository->findByHour(),
        ]);
    }
}
