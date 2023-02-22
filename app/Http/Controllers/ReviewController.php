<?php

namespace App\Http\Controllers;

use App\Command\Review\StoreHandler;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
    public function __construct(private StoreHandler $storeHandler)
    {
    }

    public function store(ReviewStoreRequest $reviewStoreRequest, int $productId)
    {
        $this->storeHandler->handle($reviewStoreRequest, $productId);

        return back()->with('success', 'Комментарий добавлен');
    }
}
