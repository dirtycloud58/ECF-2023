<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use App\Entity\Hour;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\HourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/reservation/hours', name: 'app_reservation_hours')]
    public function hours(Request $request, EntityManagerInterface $entityManager): Response
    {
        $date = $request->query->get('date');
        $selectedDate = new \DateTime($date);
        $formatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
        $formatter->setPattern('EEEE');
        $dayOfWeek = ucfirst($formatter->format($selectedDate));

        // Récupérez les heures d'ouverture pour ce jour de la semaine à partir de la base de données
        $hours = $entityManager->getRepository(Hour::class)->findOneBy(['day' => $dayOfWeek]);
        $openingHours = [
            'lunch' => [
                'opening' => $hours->getNoonOpening(),
                'closing' => $hours->getNoonClosing()
            ],
            'dinner' => [
                'opening' => $hours->getEveningOpening(),
                'closing' => $hours->getEveningClosing()
            ]
        ];
        // $heures = [];
        $heureDebut = new DateTime('00:00:00');
        $heureFin = new DateTime('23:45:00');
        $interval = new DateInterval('PT15M');

        $heuresDisponible = array();

        while ($heureDebut <= $heureFin) {
            $heuresDisponible[$heureDebut->format('H:i')] = $heureDebut->format('H:i');
            $heureDebut->add($interval);
        }

        // Convertissez les heures d'ouverture en un tableau de choix pour le formulaire
        $lunchTimeChoices = [];
        $dinnerTimeChoices = [];

        $time = DateTime::createFromFormat('Y-m-d H:i:s.u', $openingHours['lunch']['opening']->format('Y-m-d H:i:s.u'));
        $closingTime = DateTime::createFromFormat('Y-m-d H:i:s.u', $openingHours['lunch']['closing']->format('Y-m-d H:i:s.u'));
        while ($time <= $closingTime) {
            $timeValue = $time->format('H:i');
            $lunchTimeChoices[$timeValue] = $timeValue;
            $time->add(new DateInterval('PT15M'));
        }
        $time = DateTime::createFromFormat('Y-m-d H:i:s.u', $openingHours['dinner']['opening']->format('Y-m-d H:i:s.u'));
        $closingTime = DateTime::createFromFormat('Y-m-d H:i:s.u', $openingHours['dinner']['closing']->format('Y-m-d H:i:s.u'));
        while ($time <= $closingTime) {
            $timeValue = $time->format('H:i');
            $dinnerTimeChoices[$timeValue] = $timeValue;
            $time->add(new DateInterval('PT15M'));
        }
        $timeChoices = array_merge(
            $lunchTimeChoices,
            $dinnerTimeChoices
        );

        foreach ($heuresDisponible as $hour => $label) {
            if (!in_array($label, $timeChoices)) {
                unset($heuresDisponible[$hour]);
            }
        }

        $response = new JsonResponse($heuresDisponible);
        return $response;
    }


    #[Route('/reservation', name: 'app_reservation', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, HourRepository $hourRepository): Response
    {

        $heureDebut = new DateTime('00:00:00');
        $heureFin = new DateTime('23:45:00');
        $interval = new DateInterval('PT15M');

        $openingHours = array();

        while ($heureDebut <= $heureFin) {
            $openingHours[$heureDebut->format('H:i')] = $heureDebut->format('H:i');
            $heureDebut->add($interval);
        }

        // création du formulaire
        $reservation = new Reservation();
        $user = $this->getUser();
        if ($user) {
            $reservation
                ->setEmail($this->getUser()->getEmail())
                ->setGuests($this->getUser()->getGuests())
                ->addAllergies($this->getUser()->getAllergies());
        }

        $reservationForm = $this->createForm(ReservationType::class, $reservation, [
            'openingHours' => $openingHours
        ]);

        // Récupérez les heures sélectionnées à partir de la requête
        $reservationForm->handleRequest($request);


        // traitement du formulaire
        if ($reservationForm->isSubmitted() && $reservationForm->isValid()) {

            $entityManager->persist($reservation);
            $entityManager->flush();

            $this->addFlash('message', 'réservation prise en compte');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('reservation/index.html.twig', [
            'reservationForm' => $reservationForm->createView(),
            'hours' => $hourRepository->findByHour(),
            'openingHours' => $openingHours,
        ]);
    }
}
