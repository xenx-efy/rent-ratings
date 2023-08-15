<?php

namespace App\Http\Controllers;

use App\Actions\v1\FindOrCreateHouse;
use App\Models\Building;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CreateReviewController extends Controller
{
    public function get(Request $request): Response
    {
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = Building::where('address', $validated['address'])->firstOrFail();

        return Inertia::render('CreateReview', ['address' => $house->address, 'houseId' => $house->id]);
    }

    public function post(Request $request): RedirectResponse
    {
        # TODO: Добавить валидацию получше
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = FindOrCreateHouse::run($validated['address']);

        return to_route('createReview', ['address' => $house->address, 'houseId' => $house->id]);
    }
}
