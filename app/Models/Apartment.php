<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static firstOrCreate(int[] $array)
 * @method static findOrFail(int $id)
 */
class Apartment extends Model
{
    use HasFactory;

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function reviewsCount(): int
    {
        return $this->reviews()->count() ?: 1;
    }

    public function rating(): ?string
    {
        $reviewRatingSum = 0;

        foreach ($this->reviews as $review) {
            $reviewRatingSum += $review->rating;
        }

        $reviewsCount = $this->reviews()->count();

        // 3.5 format. with 1 digit after dot
        return $reviewsCount > 0 ? number_format($reviewRatingSum / $this->reviewsCount(), 1) : null;
    }
}
