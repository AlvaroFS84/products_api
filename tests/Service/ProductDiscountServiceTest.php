<?php

namespace App\Tests\Service;

use App\Service\CalculateProductFinalPrice;
use App\Service\ProductDiscountService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductDiscountServiceTest extends KernelTestCase
{
    public function testBootsDiscount()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00002",
            "price" => 85000,
            "category" => "boots"
        ];

        $result = $productDiscountService->getDiscount($mockProduct);
        $this->assertEquals($result,30);
    }

    public function testSKU3Discount()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00003",
            "price" => 85000,
            "category" => "sandals"
        ];

        $result = $productDiscountService->getDiscount($mockProduct);
        $this->assertEquals($result,15);
    }

    public function testBootsAndSKU3Discount()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00003",
            "price" => 85000,
            "category" => "boots"
        ];

        $result = $productDiscountService->getDiscount($mockProduct);
        $this->assertEquals($result,30);
    }

    public function testBootsDiscountPercentage()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00002",
            "price" => 85000,
            "category" => "boots"
        ];

        $result = $productDiscountService->getDiscountPercentage($mockProduct);
        $this->assertEquals($result,'30%');
    }

    public function testSKU3DiscountPercentage()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00003",
            "price" => 85000,
            "category" => "sandals"
        ];

        $result = $productDiscountService->getDiscountPercentage($mockProduct);
        $this->assertEquals($result,'15%');
    }

    public function testBootsAndSKU3DiscountPercentage()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00003",
            "price" => 85000,
            "category" => "boots"
        ];

        $result = $productDiscountService->getDiscountPercentage($mockProduct);
        $this->assertEquals($result,'30%');
    }

    public function testNullDiscount()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00002",
            "price" => 85000,
            "category" => "sneakers"
        ];

        $result = $productDiscountService->getDiscount($mockProduct);
        $this->assertNull($result);
    }

    public function testNullPercentageDiscount()
    {
        self::bootKernel();
        $container = static::getContainer();
        $productDiscountService  = $container->get(ProductDiscountService::class);


        $mockProduct = [
            "sku" => "00002",
            "price" => 85000,
            "category" => "sneakers"
        ];

        $result = $productDiscountService->getDiscountPercentage($mockProduct);
        $this->assertNull($result);
    }
}