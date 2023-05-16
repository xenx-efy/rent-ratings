<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function get(Request $request, int $id)
    {
        return new ApartmentResource(Apartment::find($id));
    }
}
