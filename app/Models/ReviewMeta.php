<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewMeta extends Model
{
    use HasFactory;

    protected $table = 'review_meta';

    protected $fillable = ['review_id', 'name', 'value'];
}
