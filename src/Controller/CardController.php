<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\FormuleRepository;
use App\Repository\HourRepository;
use App\Repository\MealRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route('/card', name: 'app_card')]
    public function index(FormuleRepository $formuleRepository, HourRepository $hourRepository, MenuRepository $menuRepository, CategoryRepository $categoryRepository, MealRepository $mealRepository): Response
    {
        return $this->render('card/index.html.twig', [
            'formules' => $formuleRepository->findByFormule(),
            'menus' => $menuRepository->findByMenu(),
            'hours' => $hourRepository->findByHour(),
            'categorys' => $categoryRepository->findByCategory(),
            'meals' => $mealRepository->findByMeal(),
        ]);
    }
}
