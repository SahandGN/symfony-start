<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     *
     * @Route("/", name="home")
     * @return Response
     */
    public function index()
    {

        return $this->render('home/home.html.twig', []);
    }

    #[Route('/users',name: 'users_list')]
    public function appUsers(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager
            ->getRepository(User::class)
            ->findAll();

        return $this->render('home/users.html.twig', [
            'users' => $users,
        ]);
    }
}