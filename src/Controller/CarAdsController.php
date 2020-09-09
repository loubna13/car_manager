<?php

namespace App\Controller;
use App\Repository\CarRepository;
use App\Entity\Car;
use App\Form\CarAdsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarAdsController extends AbstractController
{
    /**
     * @Route("/car/ads", name="car_ads")
     */
    public function index(Request $request)
    {

        $carads = new Car();
        $form = $this->createForm(CarAdsType::class, $carads);
        $form->handleRequest($request);
        return $this->render('car_ads/index.html.twig', [
            'controller_name' => 'CarAdsController',
            'form' => $form->createView(),
        ]);
    }
}
