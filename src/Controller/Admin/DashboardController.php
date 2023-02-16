<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Galery;
use App\Entity\Hour;
use App\Entity\Menu;
use App\Entity\Meal;
use App\Entity\Formule;
use App\Entity\Reservation;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(GaleryCrudController::class)->generateUrl());
        return $this->redirect($adminUrlGenerator->setController(HourCrudController::class)->generateUrl());
        return $this->redirect($adminUrlGenerator->setController(MenuCrudController::class)->generateUrl());
        return $this->redirect($adminUrlGenerator->setController(FormuleCrudController::class)->generateUrl());
        return $this->redirect($adminUrlGenerator->setController(CategoryCrudController::class)->generateUrl());
        return $this->redirect($adminUrlGenerator->setController(MealCrudController::class)->generateUrl());
        return $this->redirect($adminUrlGenerator->setController(ReservationCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurant');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Galerie', 'fas fa-solid fa-image', Galery::class);
        yield MenuItem::linkToCrud('Horaire', 'fas fa-solid fa-clock', Hour::class);
        yield MenuItem::linkToCrud('Menu', 'fas fa-solid fa-bars', Menu::class);
        yield MenuItem::linkToCrud('Formule', 'fas fa-solid fa-quote-left', Formule::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list-alt', Category::class);
        yield MenuItem::linkToCrud('Plat', 'fas fa-solid fa-plate-wheat', Meal::class);
        yield MenuItem::linkToCrud('Reservation', 'fa-solid fa-ticket', Reservation::class);
    }
}
