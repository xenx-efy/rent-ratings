<?php

namespace App\Actions\v1;

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Lorisleiva\Actions\Concerns\AsAction;

class GetApartmentAction
{
    use AsAction;

    public function handle(int $apartmentId)
    {
        return Apartment::findOrFail($apartmentId);
    }

    public function asController(int $id): ApartmentResource
    {
        return new ApartmentResource($this->handle($id));
    }
}
