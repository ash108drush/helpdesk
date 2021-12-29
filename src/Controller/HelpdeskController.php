<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TicketType;
use App\Entity\Tickets;

class HelpdeskController extends AbstractController
{
    /**
     * @Route("/helpdesk", name="helpdesk")
     */
    public function index(): Response
    {
		
		$ticket = new Tickets();
		$form = $this->create(TicketType::class, $ticket);
		
		
        return $this->render('helpdesk/index.html.twig', [
            'controller_name' => 'HelpdeskController',
        ]);
    }
}
