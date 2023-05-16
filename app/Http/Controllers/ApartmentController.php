<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Http\Resources\ReviewCollection;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function get(Request $request, int $id): ApartmentResource
    {
        return new ApartmentResource(Apartment::findOrFail($id));
    }

    public function getReviews(Request $request, $apartmentId)
    {
        return new ReviewCollection(Apartment::findOrFail($apartmentId)->reviews);
    }
}
