<?php

declare(strict_types=1);

namespace App\Command\Favorite;

use App\Models\ProductUser;
use Exception;

class StoreHandler
{

    public function handle(int $idProduct)
    {
        try {
            $favorite = ProductUser::create([
                'user_id' => auth()->id(),
                'product_id' => $idProduct
            ]);

             return $favorite->save();
        } catch (Exception $exception) {

        }
    }
}
