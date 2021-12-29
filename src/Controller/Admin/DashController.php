<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Tickets;
use App\Entity\Comments;
use App\Entity\Ticketstatus;
use App\Entity\Workers;
use App\Entity\Address;


class DashController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Helpdesk');
    }

    public function configureMenuItems(): iterable
    {
		return [	
		MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
		MenuItem::linkToCrud('Tickets', 'fa fa-file-text', Tickets::class),
		MenuItem::linkToCrud('Comments', 'fa fa-file-text', Comments::class),
		MenuItem::linkToCrud('Ticketstatus', 'fa fa-file-text', Ticketstatus::class),
		MenuItem::linkToCrud('Workers', 'fa fa-file-text', Workers::class),
		MenuItem::linkToCrud('Address', 'fa fa-file-text', Address::class),
		
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
		];
	}
}
