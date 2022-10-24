<?php

namespace App\Tests\Service;

use App\Service\CalculateProductFinalPrice;
use App\Service\TransformService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TransformServiceTest extends KernelTestCase
{
    public function testDataTransform()
    {
        self::bootKernel();
        $container = static::getContainer();
        $transformService  = $container->get(TransformService::class);


        $mockProduct = [
            [
                "sku" => "00003",
                "name" => "BV Lean leather ankle boots",
                "price" => 85000,
                "category" => "boots"
            ]
        ];

        $result = $transformService->transform($mockProduct);
        $this->assertIsArray($result[0]['price']);
    }
}