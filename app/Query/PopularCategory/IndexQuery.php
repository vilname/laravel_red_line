<?php

declare(strict_types=1);

namespace App\Query\PopularCategory;

use App\Repository\ProductRepository;
use Exception;

class IndexQuery
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function query()
    {
        try {
            return $this->productRepository->getPopularProduct();
        } catch (Exception $exception) {
            dump($exception);
        }
    }
}
