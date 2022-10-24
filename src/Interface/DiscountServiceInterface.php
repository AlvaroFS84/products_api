<?php

namespace App\Interface;

interface DiscountServiceInterface
{
    public function getDiscount($product):mixed;
    public function getDiscountPercentage($product):mixed;
}