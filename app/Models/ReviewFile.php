<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $path
 * @property int $review_id
 * @property string $created_at
 * @property string $updated_at
 */
class ReviewFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'review_id',
    ];

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
