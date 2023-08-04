<?php

namespace App\Actions\v1;

use App\Http\Resources\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class FindOrCreateHouse
{
    use AsAction;

    public function handle(string $address)
    {
        return Building::firstOrCreate([
            'address' => $address
        ]);
    }

    /** @group Show Apartments */
    public function asController(Request $request): BuildingResource
    {
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        return new BuildingResource($this->handle($validated['address']));
    }
}
