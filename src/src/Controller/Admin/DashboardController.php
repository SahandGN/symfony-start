<?php

namespace App\Controller\Admin;

use App\Entity\Attraction;
use App\Entity\Event;
use App\Entity\Hotel;
use App\Entity\Location;
use App\Entity\Message;
use App\Entity\Room;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('dashboard.html.twig');
    }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Isfahan tour');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Attraction', 'fa fa-tags',Attraction::class);
        yield MenuItem::linkToCrud('Event', 'fa fa-tags',Event::class);
        yield MenuItem::linkToCrud('Hotel', 'fa fa-tags',Hotel::class);
        yield MenuItem::linkToCrud('Location', 'fa fa-tags',Location::class);
        yield MenuItem::linkToCrud('Message', 'fa fa-tags',Message::class);
        yield MenuItem::linkToCrud('Room', 'fa fa-tags',Room::class);
        yield MenuItem::linkToCrud('User', 'fa fa-tags',User::class);


    }
}
