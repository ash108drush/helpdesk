<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Ticketstatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TicketType;
use App\Entity\Tickets;
use Monolog\DateTimeImmutable;




class HelpdeskController extends AbstractController
{
    /**
     * @Route("/{offset}", name="homepage")
     */
    public function index(Request $request,EntityManagerInterface $entityManager,int $offset=0): Response
    {
        $ticket = new Tickets();
        $choices=$entityManager->getRepository(Address::class)->GetnameChoice() ;
        $form = $this->createForm(TicketType::class, $ticket,['address_choice'=>$choices]);
        $form->handleRequest($request);
        $limit = 20;
        $tickets=$entityManager->getRepository(Tickets::class)->findBy([],['opendate'=>'ASC'],$limit,$offset);
        if ($form->isSubmitted() && $form->isValid() ) {
             //$form->getData();//holds the submitted values
            // but, the original `$task` variable has also been updated
            //$task = $form->getData();

           // dump($task);
            //$ticket->setMessage($task['message']);
            //$ticket->setName($task['name']);
            //$ticket->setPhone($task['phone']);
            $adr_id=intval($form->get('a_choice')->getData());
            $adr=$entityManager->getRepository(Address::class)->find($adr_id);
             $ticket->setAddress($adr);
            $now = new DateTimeImmutable('now');
            $ticket->setOpendate($now);
            $status=$adr=$entityManager->getRepository(Ticketstatus::class)->find(1);
            $ticket->setStaus($status);
            //dump($ticket);
            $entityManager->persist($ticket);
            $entityManager->flush();
            //return new Response('Saved new product with id '.$product->getId());

           // return $this->redirectToRoute('task_success');
           // return $this->render('helpdesk/index.html.twig', [
           //     'controller_name' => 'Answer',
            //   'form' => $form->createView(),
          // ]);

        }
        //dump($tickets);
        return $this->render('helpdesk/index.html.twig', [
                'controller_name' => 'HelpdeskController',
                'form' => $form->createView(),
                'tickets' =>$tickets,
            ]);


    }


}
