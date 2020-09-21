<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Booking;
use App\Entity\Search;
use App\Form\SearchType;
use App\Form\CarType;
use App\Form\BookingType;
use App\Repository\SearchRepository;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/car")
 */
class CarController extends AbstractController
{
    /**
     * @Route("/", name="car_index", methods={"GET","POST"})
     */
    public function index(SearchRepository $searchRepository, CarRepository $carRepository, PaginatorInterface $paginatorInterface, Request $request): Response
    {    
        // to use the entity car search in findAllWithPagination function (query treatement)

        // car search treatement
        $carSearch = new Search(); 
        $booking = new Booking();  
        $form = $this->createForm(BookingType:: class,$booking);
        $form = $this->createForm(SearchType:: class,$carSearch);
        $form->handleRequest($request);
        
        
        $cars = $paginatorInterface->paginate(
            $carRepository->findFilter($booking),
            
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
            
        );
        $cars1 = $paginatorInterface->paginate(

            $searchRepository->findByMinPrice($carSearch),
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
       
        );
        // dd($carRepository->findFilter());
      
        return $this->render('car/index.html.twig', [
            'cars' => $cars,
            'cars1' => $cars1,
            'form' => $form->createView(),
           
        ]);
    }

    /**
     * @Route("/new", name="car_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('car_index');
        }

        return $this->render('car/new.html.twig', [
            'car' => $car,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="car_show", methods={"GET"})
     */
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="car_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Car $car): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('car_index');
        }

        return $this->render('car/edit.html.twig', [
            'car' => $car,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="car_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Car $car): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('car_index');
    }
}
