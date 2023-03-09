<?php

namespace App\Controller;

use App\Form\EditProfileType;
use App\Repository\HourRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfileController extends AbstractController
{
    #[Route('/profil', name: 'app_profile')]
    public function index(HourRepository $hourRepository, UserRepository $userRepository, ReservationRepository $reservationRepo): Response
    {

        return $this->render('profile/index.html.twig', [
            '$users' => $userRepository->findByUser(),
            'reservations' => $reservationRepo->findByReservation(),
            'hours' => $hourRepository->findByHour(),
        ]);
    }
    #[Route('/profil/modifier', name: 'app_modification')]
    public function editProfile(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, HourRepository $hourRepository, ReservationRepository $reservationRepo): Response
    {

        $user = $this->getUser();

        //modification du mot de passe
        if ($request->isMethod('POST')) {
            if ($request->request->get('pass') == $request->request->get('pass2')) {
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $request->request->get('pass')
                    )
                );
                $entityManager->flush();
                $this->addFlash('message', 'Mot de passe mis à jour');

                return $this->redirectToRoute('app_profile');
            } else {
                $this->addFlash('erreur', 'les deux mots de passe ne sont pas identiques');
            }
        };

        //modification convives et allergies
        $form = $this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/modification.html.twig', [
            'editProfile' => $form->createView(),
            'reservations' => $reservationRepo->findByReservation(),
            'hours' => $hourRepository->findByHour(),
        ]);
    }
}
