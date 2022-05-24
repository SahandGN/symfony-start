<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     *
     * @Route("/about", name="aboutus")
     * @return void
     *
     */
    public function about()
    {
        return $this->render('about/about.html.twig', []);
    }
}