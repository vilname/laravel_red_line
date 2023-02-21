<?php

declare(strict_types=1);

namespace App\Command\Product;

use App\Models\Product;
use Exception;

class EditCommand
{
    public function handle(int $id)
    {
        try {
            return Product::find($id);
        } catch (Exception $exception) {

        }
    }
}
