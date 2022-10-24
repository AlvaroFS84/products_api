<?php

namespace App\Service;

use App\Interface\CalculateFinalPriceInterface;
use App\Interface\DiscountServiceInterface;
use App\Interface\TransformServiceInterface;

class TransformService implements TransformServiceInterface
{
    private DiscountServiceInterface $discountService;
    private CalculateFinalPriceInterface $calculateFinalPriceService;

    public function __construct(DiscountServiceInterface $discountService, CalculateFinalPriceInterface $calculateFinalPriceService)
    {
        $this->discountService = $discountService;
        $this->calculateFinalPriceService = $calculateFinalPriceService;
    }

    public function transform(array $products):array{

        foreach($products as &$product){
            $final_price = $this->calculateFinalPriceService->calculateFinalPrice($product);
            $transformed_price = [
                'original' => $product['price'],
                'final' => $final_price,
                'discount_percentage' =>  $this->discountService->getDiscountPercentage($product),
                'currency' => 'EUR'
            ];

            $product['price'] = $transformed_price;
        }

       
        return $products;
    }

}