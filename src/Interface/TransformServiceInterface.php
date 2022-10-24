<?php

namespace App\Interface;

interface TransformServiceInterface
{
    public function transform(array $products):array;
}