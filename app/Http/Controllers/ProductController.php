<?php

namespace App\Http\Controllers;

use App\Command\Product\IndexHandler;

class ProductController extends Controller
{
    private const PAGE_SIZE = 15;

    public function __construct(private IndexHandler $indexHandle)
    {
    }

    public function index()
    {
        $products = $this->indexHandle->handle(self::PAGE_SIZE);

//        dd($products);

        return view('product.index', [
            'products' => $products
        ]);
    }
}
