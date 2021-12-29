<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\Tickets;

class HelpdeskController extends AbstractController
{
    /**
     * @Route("/helpdesk", name="helpdesk")
     */
    public function index(): Response
    {
		
		$ticket = new Tickets();
		$form = $this->createFormBuilder($task)
            ->add('name', TextType::class, ['label' => 'Ваше имя:'])
			->add('phone', TextType::class,['label' => 'Мобильный телефон:'])
			->add('message', TextType::class,['label' => 'Сообщение:'])
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();
		
		
        return $this->render('helpdesk/index.html.twig', [
            'controller_name' => 'HelpdeskController',
        ]);
    }
}
