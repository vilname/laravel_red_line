<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $comment
 * @property int $user_id
 * @property int $product_id
 * @property string $created_at
 * @property string $updated_at
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'product_id',
    ];

    public function reviewFiles(): HasMany
    {
        return $this->hasMany(ReviewFile::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
