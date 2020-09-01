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
        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brand = $form->getPickLocation();
            $pdate = $form->getPickDate();
            $rdate = $form->getReturnDate();
            $pickcar = $form->getPickCar();

          
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),'brand' =>$brand,'pdate'=>$pdate,'rdate'=>$rdate,'pickcar'=>$pickcar
        ]);
    }
        
}
