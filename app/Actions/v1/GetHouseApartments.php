<?php

namespace App\Actions\v1;

use App\Http\Resources\ApartmentCollection;
use App\Models\Building;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class GetHouseApartments
{
    use AsAction;

    public function handle(int $houseId)
    {
        return Building::findOrFail($houseId)->apartments;
    }

    /** @group Show Apartments */
    public function asController(Request $request): \Inertia\Response
    {
        # TODO: make validation to string, not numbers
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = FindOrCreateHouse::run($validated['address']);

        return Inertia::render('House', [
            'apartments' => new ApartmentCollection($this->handle($house->id)),
            'address' => $request->address,
        ]);
    }
}
