<?php

declare(strict_types=1);

namespace App\Query\Product;

use App\Repository\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class IndexQuery
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function handle(int $pageSize): LengthAwarePaginator
    {
        return $this->productRepository->getListPagination($pageSize);
    }
}
