<?php

namespace App\Controller;
use App\Entity\Booking;
use App\Entity\Car;
use App\Form\BookingType;
use App\Repository\CarRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    
    public function index(Request $request, CarRepository $carRepository): Response
    
    {
        $car=$carRepository->findOneBy(['id']);



        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);
        $brand = [];
        $pickdate = [];
        $returndate = [];
        $pickcar = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $brand = $form->getBrand();
            $pickdate = $form->getPickDate();
            $returndate = $form->getReturnDate();
            $pickcar = $form->getPickCar();
            $picklocation = $form->getPickLocation();

          
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),'brand' =>$brand,'pdate'=>$pickdate,'rdate'=>$returndate,'pickcar'=>$pickcar,'picklocation'=>$picklocation
        ]);
    }
        
}

