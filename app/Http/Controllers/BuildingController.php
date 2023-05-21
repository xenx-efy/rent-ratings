<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentCollection;
use App\Http\Resources\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function getApartments(Request $request, int $id): ApartmentCollection
    {
       $apartments = Building::findOrFail($id)->apartments;

       return new ApartmentCollection($apartments);
    }
}
