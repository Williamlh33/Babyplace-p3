<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgendaController extends AbstractController
{
    #[Route('/agenda', name: 'app_agenda')]
    public function index(CalendarRepository $calendarRepository): Response
    {
        $events = $calendarRepository->findAll();

        $rdvs = [];

        foreach ($events as $event) {
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }
        $data = json_encode($rdvs);

        return $this->render('agenda/agenda.html.twig', compact('data'));
    }

    #[Route('/creneaux', name: 'app_creneaux')]
    public function listReservation(CalendarRepository $calendarRepository): Response
    {
        $events = $calendarRepository->findAll();

        return $this->render('agenda/creneaux.html.twig', [
            "events" => $events
        ]);
    }
}
