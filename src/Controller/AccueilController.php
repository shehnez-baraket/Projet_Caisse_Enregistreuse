<?php


namespace App\Controller;

use App\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/accueil")
 */
class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/caisse", name="Caisse")
     */
    public function afficher(): Response
    {
        return $this->render('accueil/caisse.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
        var_dump($_POST);
    }
    /**
     * @Route("/Cmd", name="Cmd")
     */
    public function afficherCommande(): Response
    {
        return $this->render('accueil/cmd.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/Ticket", name="ticket_new", methods={"GET","POST"})
     */

    public function new(Request $request): Response
    {

        $ticket = new Ticket();
        $formulaire = $this->createForm(TicketType::class, $ticket);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticket);
            $entityManager->flush();

            return $this->redirectToRoute('ticket_index');
        }

        return $this->render('ticket/new.html.twig', [
            'ticket' => $ticket,
            'form' => $formulaire->createView(),
        ]);
    }
}
