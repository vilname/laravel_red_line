<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function getListPagination(int $pageSize): LengthAwarePaginator
    {
        return Product::with(['users', 'section'])->paginate($pageSize);
    }
}
