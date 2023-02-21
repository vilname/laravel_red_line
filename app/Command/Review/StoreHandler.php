<?php

declare(strict_types=1);

namespace App\Command\Review;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\Review;
use App\Models\ReviewFile;
use Illuminate\Support\Facades\DB;
use Exception;

class StoreHandler
{
    public function handle(ReviewStoreRequest $reviewStoreRequest, int $productId)
    {
        try {
            DB::transaction(function () use ($reviewStoreRequest, $productId) {
                $review = Review::create([
                    'comment' => $reviewStoreRequest->comment,
                    'user_id' => auth()->id(),
                    'product_id' => $productId,
                ]);

                if ($reviewStoreRequest->hasFile('files')) {
                    foreach ($reviewStoreRequest->file('files') as $file) {
                        $path = $file->store('reviews');

                        ReviewFile::create([
                            'path' => $path,
                            'review_id' => $review->id
                        ]);
                    }
                }
            });
        } catch (Exception $exception) {
            dump($exception);
        }
    }
}
