<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function getListPagination(int $pageSize): LengthAwarePaginator
    {
        return Product::with(['users', 'section'])->paginate($pageSize);
    }

    public function getPopularProduct()
    {
        return Product::withCount('reviews')
            ->orderBy('reviews_count', 'desc')
            ->limit(Product::LIMIT_POPULAR_PRODUCT)
            ->get();
    }
}
