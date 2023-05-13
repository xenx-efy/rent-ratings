<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EvaluationCriteria extends Model
{
    use HasFactory;

    protected $table = 'evaluation_criteria';

    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(Review::class, 'review_ratings', 'evaluation_criteria_id', 'review_id')->withPivot(['rating']);
    }
}
