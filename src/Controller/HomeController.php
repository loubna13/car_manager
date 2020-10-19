<?php

namespace App\Controller;
use App\Entity\Booking;
use App\Entity\Car;
use App\Entity\Model;
use App\Entity\Search;
use App\Form\BookingType;
use App\Form\SearchType;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    
    public function index(Request $request, CarRepository $carrepository, paginatorInterface $paginatorInterface)
    {
        
        // $carSearch = new Search();
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        // $form = $this->createForm(SearchType:: class,$carSearch);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
        
            $picklocation= $form->get('pickLocation')->getData();
            $car= $form->get('car')->getData();
            $brand=$car->getBrand();
           // dd($brand);

            $pickdate= $form->get('pickDate')->getData();

            $returndate= $form->get('returnDate')->getData();
            // $minprice= $form->get('minPrice')->getData();

            // $maxprice= $form->get('maxPrice')->getData();

        
            //dd($form->getData(),$picklocation);
            
            $entityManager = $this->getDoctrine()->getManager();
            $booking->setUser($this->getUser());
            //$entityManager->persist($booking);
            //$entityManager->flush();
    
            // $this->addFlash(
            //     'success',
            //     "Votre réservation  a été prise en compte avec succès!"
            // );

            $resultats=$carrepository->findByDateandBrand($brand,$pickdate,$returndate);
            //$resultats2=$carrepository->findByMinPrice($minprice,$maxprice);

           
            //dd($resultats);

        

            return $this->render('car/listeresultats.html.twig', [
                'resultats'=> $resultats,
                //'resultats2'=> $resultats2
                                           
            ]);
        }

      
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            
            
        ]);
    }
        
}

