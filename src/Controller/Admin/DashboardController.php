<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Stock;
use App\Entity\Client;
use App\Entity\Ticket;
use App\Entity\Depense;
use App\Entity\Produit;
use App\Entity\Fournisseur;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;

use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(ClientCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SOLUTEC PROJECT');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Fournisseur', 'fas fa-male', Fournisseur::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Client', 'fas fa-users', Client::class)->setPermission('ROLE_SUPER_ADMIN')
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Dépense', 'fa fa-money', Depense::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Ticket', 'fas fa-file-invoice-dollar', Ticket::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Produit', 'fas fa-hamburger', Produit::class)->setPermission('ROLE_ADMIN');
    }
    /**
     * @Route("/stats", name="stats")
     */
    public function stats()
    {
        echo "bonjou";
    }
}
