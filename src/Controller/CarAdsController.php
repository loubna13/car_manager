<?php

namespace App\Controller;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CarAdsController extends AbstractController
{
    /**
     * @Route("/car/ads", name="car_ads")
     */
    public function index()
    {
        return $this->render('car_ads/index.html.twig', [
            'controller_name' => 'CarAdsController',
        ]);
    }
}
