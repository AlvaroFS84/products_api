<?php

namespace App\Interface;

interface CalculateFinalPriceInterface
{
    public function calculateFinalPrice($product):?int;
}