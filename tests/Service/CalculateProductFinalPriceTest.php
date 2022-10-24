<?php

namespace App\Tests\Service;

use App\Service\CalculateProductFinalPrice;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculateProductFinalPriceTest extends KernelTestCase
{
    public function testFinalPrice()
    {
        self::bootKernel();
        $container = static::getContainer();
        $calculateProductFinalPriceService  = $container->get(CalculateProductFinalPrice::class);


        $mockProduct = [
            "sku" => "00003",
            "price" => 85000,
            "category" => "boots"
        ];

        $result = $calculateProductFinalPriceService->calculateFinalPrice($mockProduct);
        $this->assertEquals($result,59499);
    }
}