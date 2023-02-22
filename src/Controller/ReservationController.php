<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\AllergyRepository;
use App\Repository\HourRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ReservationController extends AbstractController
{


    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request, EntityManagerInterface $entityManager, HourRepository $hourRepository, ReservationRepository $reversations): Response
    {
        $user = $this->getUser();
        $reservation = new Reservation();
        if ($user) {
            $reservation
                ->setEmail($this->getUser()->getEmail())
                ->setGuests($this->getUser()->getGuests())
                ->addAllergies($this->getUser()->getAllergies());
        }
        $reservationForm = $this->createForm(ReservationType::class, $reservation)->handleRequest($request);

        if ($reservationForm->isSubmitted() && $reservationForm->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }


        return $this->render('reservation/index.html.twig', [
            'reservationForm' => $reservationForm->createView(),
            'hours' => $hourRepository->findByHour(),
            'reservations' => $reversations->findByReservation(),
        ]);
    }
}
