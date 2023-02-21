<?php

declare(strict_types=1);

namespace App\Command\ProductUser;

use App\Models\Product;
use Exception;

class StoreHandler
{

    public function handle(int $productId)
    {
        try {
            $product = Product::find($productId);

            $productUser = $product
                ->users()
                ->where([
                    'id' => auth()->id()
                ])
                ->first();

            if (is_null($productUser)) {
                $product->users()->attach(auth()->id());
            } else {
                $product->users()->detach(auth()->id());
            }
        } catch (Exception $exception) {
            dump($exception);
        }
    }
}
