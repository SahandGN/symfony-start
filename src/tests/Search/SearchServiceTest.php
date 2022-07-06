<?php

namespace App\Tests\Search;

use App\Search\SearchService;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SearchServiceTest extends KernelTestCase
{

    public function testSearchHotel()
    {
        self::createKernel();
        self::bootKernel();
        $container = static::getContainer();

        /** @var SearchService $searchService */
        $searchService = $container->get(SearchService::class);

        $result = $searchService->searchHotel("Hotel");
        $this->assertNotEmpty($result);

    }
}
