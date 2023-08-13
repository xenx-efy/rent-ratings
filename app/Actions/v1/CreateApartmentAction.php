<?php

namespace App\Actions\v1;

use App\Models\Apartment;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateApartmentAction
{
    use AsAction;

    public function handle(int $buildingId, int $number)
    {
        return Apartment::firstOrCreate([
            'building_id' => $buildingId,
            'number' => $number
        ]);
    }
}
