<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static firstOrCreate(array $array)
 */
class Building extends Model
{
    use HasFactory;

    protected $fillable = ['address'];

    public function apartments(): HasMany
    {
        return $this->hasMany(Apartment::class);
    }
}
