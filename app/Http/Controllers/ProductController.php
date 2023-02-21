<?php

namespace App\Http\Controllers;

use App\Command\Product\EditCommand;
use App\Query\Product\IndexQuery;

class ProductController extends Controller
{
    private const PAGE_SIZE = 15;

    public function __construct(
        private IndexQuery $indexQuery,
        private EditCommand $editCommand
    ) {
    }

    public function index()
    {
        $products = $this->indexQuery->query(self::PAGE_SIZE);

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function edit(int $id)
    {
        $product = $this->editCommand->handle($id);

        return view('product.edit', [
            'product' => $product
        ]);
    }
}
