<?php

declare(strict_types=1);

namespace App\Query\Product;

use App\Repository\ProductRepository;
use Exception;

class SearchQuery
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function query(string $search)
    {
        try {
            return $this->productRepository->getProductAndSectionByName($search);
        } catch (Exception $exception) {
            dump($exception);
        }
    }
}
