<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;

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

    public function getProductAndSectionByName(string $name)
    {
        return Product::where('name', 'ilike', '%' . $name . '%')
            ->orWhereHas('section', function ($query) use ($name) {
                return $query
                    ->where('name', 'ilike', '%' . $name . '%');
            })
            ->with('section')
            ->get();
    }
}
