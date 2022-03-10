<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Utilisateur;
use App\Form\ReservationType;
use App\Form\UtilisateurType;
use http\Cookie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $recetteAccueil = $this->getDoctrine()->getRepository(Recette::class)->randomRecette();
        return $this->render('default/index.html.twig', [
            'recetteAccueil' => $recetteAccueil,
        ]);
    }

    /**
     * @Route("/voir_recette/{id}",requirements={"id": "\d*"}, name="voir_recette")
     */
    public function voirRecette($id){
        $uneRecette = $this->getDoctrine()->getRepository(Recette::class)->find($id);
        return $this->render('default/voir_recette.html.twig', [
            'uneRecette' => $uneRecette
        ]);
    }
/*
    /**
     * @Route("/recettes/{type}", name="recettes")
     */
    /*
    public function recettes($type){
        //echo 'cookie est là ?';
        $typeRecette = $type;
        if($type == 'all'){
           $lesRecettes = $this->getDoctrine()->getRepository(Recette::class)->findAll();

        }
        else {
            $lesRecettes = $this->getDoctrine()->getRepository(Recette::class)->findBy(['type' => $type]);

        }
        return $this->render('default/recettes.html.twig', [
            'lesRecettes' => $lesRecettes
        ]);
    }*/

    /**
     * @Route("/reserver", name="reservation")
     */
    public function reservation(Request $request) {
        if($this->isGranted("ROLE_USER")){
            $reservation = new Reservation();
            $u = $this->getDoctrine()->getRepository(Utilisateur::class)->find($this->getUser());
            $reservation->setIdClient($u);
            $form = $this->createForm(ReservationType::class, $reservation);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($reservation);
                $em->flush();
                $this->addFlash('reservationCree', "Réservation créé !");
                return $this->redirectToRoute('accueil');
            }
            return $this->render('default/reservation.html.twig', [
                'form' => $form->createView()
            ]);
        }
        else {
            return $this->render('default/reservation.html.twig');
        }

    }

    /**
     * @Route("/creation_compte", name="creer_compte")
     */
    public function creer_compte(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
            $user = new Utilisateur();
            $user->setRoles(['ROLE_USER']);
            $form = $this->createForm(UtilisateurType::class, $user);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $mdp = $passwordEncoder->encodePassword($user, $user->getPassword());
                $user->setPassword($mdp);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $this->addFlash('compteCree', "Compte créé !");
                return $this->redirectToRoute('accueil');
            }
            return $this->render('default/creer_compte.html.twig', [
                'form' => $form->createView()
            ]);

    }

}
