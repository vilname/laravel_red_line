<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Query\PopularCategory\IndexQuery;

class PopularProductController extends Controller
{
    public function __construct(private IndexQuery $indexQuery)
    {
    }

    public function index()
    {
        $products = $this->indexQuery->query();

        return view('popularProduct.index', [
            'products' => $products
        ]);
    }
}
