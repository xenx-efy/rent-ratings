<?php

namespace App\Models;

use App\Enums\ReviewMetaName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewMeta extends Model
{
    use HasFactory;

    protected $table = 'review_meta';

    protected $fillable = ['review_id', 'name', 'value'];

    protected $casts = [
        'name' => ReviewMetaName::class,
    ];

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
