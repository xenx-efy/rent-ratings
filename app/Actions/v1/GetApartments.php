<?php

namespace App\Actions\v1;

use App\Http\Resources\ApartmentCollection;
use App\Models\Building;
use Lorisleiva\Actions\Concerns\AsAction;

class GetApartments
{
    use AsAction;

    public function handle(int $buildingId)
    {
        return Building::findOrFail($buildingId)->apartments;
    }

    public function asController(int $id): ApartmentCollection
    {
        return new ApartmentCollection($this->handle($id));
    }
}
