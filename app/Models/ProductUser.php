<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $product_id
 */
class ProductUser extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'product_user';

    protected $fillable = ['user_id', 'product_id'];
}
