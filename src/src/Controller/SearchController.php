<?php

namespace App\Controller;

use App\Search\SearchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function search(Request $request, SearchService $searchHotel): Response
    {
        $q = $request->query->get('query');
        $hotels = $searchHotel->searchHotel($q);



        return $this->render('search/index.html.twig', [
            'query' => $q,
            'hotels' => $hotels
        ]);
    }
}
