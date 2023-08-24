<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentCollection;
use App\Models\Building;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HousePageController extends Controller
{
    public function get(Request $request)
    {
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = Building::where('address', $validated['address'])->firstOrFail();

        return Inertia::render('House', ['address' => $house->address, 'apartments' => new ApartmentCollection($house->apartments)]);
    }

    public function post(Request $request): RedirectResponse
    {
        # TODO: Добавить валидацию получше
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = Building::firstOrCreate([
            'address' => $validated['address']
        ]);

        return to_route('house', ['address' => $house->address]);
    }

}
