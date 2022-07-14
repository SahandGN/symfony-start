<?php

namespace App\Tests\Search;

use App\Entity\Hotel;
use App\Entity\User;
use App\Search\SearchService;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SearchServiceTest extends KernelTestCase
{

    public function testSearchHotel()
    {
        self::getKernelClass();
        self::bootKernel();


        $container = static::getContainer();

        /** @var  SearchService $searchService */
        $searchService = $container->get(SearchService::class);
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('doctrine')->getManager();

        $user = new User();
        $user->setEmail("email@test.com");
        $user->setPassword("1234");

        $hotel = new Hotel();
        $hotel->setName("hotel parsian sepahan");
        $hotel->setCreatorUser($user);
        $hotel->setUpdaterUser($user);
        $entityManager->persist($hotel);

        $result = $searchService->searchHotel("parsian");
        $this->assertNotEmpty($result);


    }
}
