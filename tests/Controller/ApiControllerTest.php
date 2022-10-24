<?php

namespace App\Tests\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testRequestWithoutQueryParams(): void
    {
           
        $client = static::createClient([], ['HTTP_HOST' => 'localhost:8000']);

        // Request a specific page
        $crawler = $client->request('GET', '/api/products');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }

    public function testREquestWithCategoryQueryParam(): void
    {
        
        $client = static::createClient([], ['HTTP_HOST' => 'localhost:8000']);

        // Request a specific page
        $crawler = $client->request('GET', '/api/products?category=boots');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }

    public function testREquestWithPricesLessThanQueryParam(): void
    {
        
        $client = static::createClient([], ['HTTP_HOST' => 'localhost:8000']);

        // Request a specific page
        $crawler = $client->request('GET', '/api/products?priceLessThan=70000');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }
}
