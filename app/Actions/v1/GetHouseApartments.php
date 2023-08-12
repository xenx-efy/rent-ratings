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

    public function handle(string $houseAddress)
    {
        return Building::where('address', $houseAddress)->firstOrFail()->apartments;
    }

    /** @group Show Apartments */
    public function asController(Request $request): \Inertia\Response
    {
        # TODO: make validation to string, not numbers
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        return Inertia::render('House', [
            'apartments' => new ApartmentCollection($this->handle($validated['address'])),
            'address' => $validated['address'],
        ]);
    }
}
