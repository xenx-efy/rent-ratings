<?php

namespace App\Http\Controllers;

use App\Actions\v1\GetApartmentReviewsAction;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Inertia\Inertia;
use Inertia\Response;

class ApartmentPageController extends Controller
{
    public function get(int $id): Response
    {
        $apartment = Apartment::findOrFail($id);

        return Inertia::render('Apartment', [
            'apartment' => new ApartmentResource($apartment),
            'address' => $apartment->building->address,
            'reviews' => GetApartmentReviewsAction::run($apartment->id)
        ]);
    }
}
