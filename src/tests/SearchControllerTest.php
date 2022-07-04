<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/search?query=abbasi');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('td', 'abbasi');
    }
}
