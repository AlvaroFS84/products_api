<?php

namespace App\Controller;

use App\Entity\Product;
use App\Interface\TransformServiceInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/products', name: 'api_products')]
    public function products(Request $request,NormalizerInterface $serializer, ManagerRegistry $doctrine, TransformServiceInterface $transformService): Response
    {
        
        $products = $doctrine->getRepository(Product::class)->findByQueryParams( 
            $request->query->get('category'),  
            $request->query->get('priceLessThan') 
        );
        $serialized_products = $serializer->normalize($products);
        $transformedProducts = $transformService->transform($serialized_products);

        return new JsonResponse(
            array('products' => $transformedProducts)
        );
    }
}