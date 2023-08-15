<?php

namespace App\Http\Controllers;

use App\Actions\v1\FindOrCreateHouse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CreateReviewController extends Controller
{
    public function get(Request $request): Response
    {
        # TODO: Добавить валидацию получше
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = FindOrCreateHouse::run($validated['address']);

        return Inertia::render('CreateReview', ['address' => $house->address, 'houseId' => $house->id]);
    }
}
