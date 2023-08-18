<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\EvaluationCriteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CreateReviewPageController extends Controller
{
    public function get(Request $request): Response
    {
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        $house = Building::where('address', $validated['address'])->firstOrFail();

        $evaluationCriteria = EvaluationCriteria::all(['id', 'name']);


        return Inertia::render('CreateReview', ['address' => $house->address, 'houseId' => $house->id, 'hola' => 'asdf', 'evaluationCriteria' => $evaluationCriteria]);
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

        return to_route('createReview', ['address' => $house->address, 'houseId' => $house->id]);
    }
}
