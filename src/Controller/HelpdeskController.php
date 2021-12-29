<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelpdeskController extends AbstractController
{
    /**
     * @Route("/helpdesk", name="helpdesk")
     */
    public function index(): Response
    {
        return $this->render('helpdesk/index.html.twig', [
            'controller_name' => 'HelpdeskController',
        ]);
    }
}
