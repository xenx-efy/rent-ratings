<?php

namespace App\Actions\v1;

use App\Models\Building;
use Illuminate\Http\RedirectResponse;
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
    public function asController(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = $this->handle($validated['address']);

        return to_route('house', ['address' => $validated['address']]);
    }
}
