<?php

namespace App\Http\Controllers;

use App\Command\Product\EditHandler;
use App\Http\Requests\SearchProductRequest;
use App\Query\Product\IndexQuery;
use App\Query\Product\SearchQuery;

class ProductController extends Controller
{
    private const PAGE_SIZE = 15;

    public function __construct(
        private IndexQuery $indexQuery,
        private SearchQuery $searchQuery,
        private EditHandler $editHandler
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
        $product = $this->editHandler->handle($id);

        return view('product.edit', [
            'product' => $product
        ]);
    }

    public function search(SearchProductRequest $request)
    {
        $products = $this->searchQuery->query($request->search);

        return view('product.search', [
            'products' => $products
        ]);
    }
}
