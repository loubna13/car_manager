<?php

namespace App\Controller;
use App\Entity\Booking;
use App\Form\BookingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    
    public function index(Request $request)
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $booking->setUser($this->getUser());
            $entityManager->persist($booking);
            $entityManager->flush();
    
            // $this->addFlash(
            //     'success',
            //     "Votre réservation  a été prise en compte avec succès!"
            // );


            return $this->redirectToRoute('car_index');
        }

      
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
        
}

