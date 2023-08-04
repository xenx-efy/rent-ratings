<?php

namespace App\Actions\v1;

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class GetApartmentAction
{
    use AsAction;

    public function handle(int $apartmentId)
    {
        return Apartment::findOrFail($apartmentId);
    }

    /** @group Show Reviews */
    public function asController(int $id): \Inertia\Response
    {
        $apartment = $this->handle($id);

        return Inertia::render('Apartment', [
            'apartment' => new ApartmentResource($apartment),
            'address' => $apartment->building->address,
            'reviews' => GetApartmentReviewsAction::run($apartment->id)
        ]);
    }
}
