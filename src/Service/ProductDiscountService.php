<?php

namespace App\Service;

use App\Interface\DiscountServiceInterface;

class ProductDiscountService implements DiscountServiceInterface
{
    public function getDiscount($product):mixed
    {
        $discount = null;
        if($product['category'] == 'boots'){
            $discount = 30;
        }
        if($product['sku'] == 3 ){
            if($discount < 15)
            {
                $discount = 15;
            }
                
        }
        return $discount;
    }

    public function getDiscountPercentage($product):mixed
    {
        $discount = $this->getDiscount($product);

        return is_null($discount)?$discount:$discount.'%';
    }
}
