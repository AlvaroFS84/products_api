<?php

namespace App\Service;

use App\Interface\CalculateFinalPriceInterface;
use App\Interface\DiscountServiceInterface;

class CalculateProductFinalPrice implements CalculateFinalPriceInterface
{
    private DiscountServiceInterface $discountService;

    public function __construct(DiscountServiceInterface $discountService)
    {
        $this->discountService = $discountService;
    }
    
    public function calculateFinalPrice($product):?int
    {
        return   $product['price'] == 0?  $product['price']:(( 100 - $this->discountService->getDiscount($product)) /100) * $product['price'];
    }
}