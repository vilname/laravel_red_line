<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Command\ProductUser\StoreHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductUserController extends Controller
{
    public function __construct(private StoreHandler $storeHandler)
    {
    }

    public function store(Request $request): Response
    {
        $this->storeHandler->handle((int)$request->productId);

        return new Response([
            'success' => true
        ]);
    }
}
