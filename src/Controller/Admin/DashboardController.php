<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use App\Entity\Recette;
use App\Entity\Reservation;
use App\Entity\TypeRecette;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
       // return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(RecetteCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Web S4');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Recettes', 'fas fa-utensils', Recette::class);
        yield MenuItem::linkToCrud('Types de recettes', 'fas fa-list', TypeRecette::class);
        yield MenuItem::linkToCrud('Réservations', 'fas fa-calendar-alt', Reservation::class);
        yield MenuItem::linkToCrud('Horaires de réservation', 'fas fa-clock', Horaire::class);
    }
}
