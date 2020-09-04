<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogDetailsController extends AbstractController
{
    /**
     * @Route("/blog/details", name="blog_details")
     */
    public function index()
    {
        return $this->render('blog_details/index.html.twig', [
            'controller_name' => 'BlogDetailsController',
        ]);
    }
}
