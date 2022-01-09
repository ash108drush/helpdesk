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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;



class HelpdeskController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        $ticket = new Tickets();
        $offset=0;
        $pages=0;
        $action="";
        if($request->query->get('offset') != null){
            $offset=intval($request->query->get('offset'));
        }
        if($request->query->get('action') != null){
            $action=$request->query->get('action');
        }
        $choices=$entityManager->getRepository(Address::class)->GetnameChoice() ;
        $form = $this->createForm(TicketType::class, $ticket,['address_choice'=>$choices]);
        $form->handleRequest($request);
        $limit = 10;
        //$tickets=$entityManager->getRepository(Tickets::class)->findBy([],['opendate'=>'DESC'],$limit,$offset);
        $TicketsRepository=$entityManager->getRepository(Tickets::class);
        $tickets=$TicketsRepository->getTicketsPaginator($offset);

        //dump($this->generateUrl('homepage',array('slug' => 'ticketdone')));
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

            return $this->redirectToRoute('homepage',["action"=>"ticketdone"]);
           // return $this->render('helpdesk/index.html.twig', [
           //     'controller_name' => 'Answer',
            //   'form' => $form->createView(),
          // ]);

        }
        dump($tickets);
        return $this->render('helpdesk/index.html.twig', [
                'controller_name' => 'HelpdeskController',
                'form' => $form->createView(),
                'tickets' =>$tickets,
                'action'=>$action,
                'pages'=>$pages,
                'perpage' => $TicketsRepository::PAGINATOR_PER_PAGE,
                'previous' => $offset - $TicketsRepository::PAGINATOR_PER_PAGE,
            	'next' => min(count($tickets), $offset + $TicketsRepository::PAGINATOR_PER_PAGE),


            ]);


    }


}
