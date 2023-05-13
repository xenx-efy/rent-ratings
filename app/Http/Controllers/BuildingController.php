<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentCollection;
use App\Http\Resources\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function findOrCreate(Request $request): BuildingResource
    {
        $validated = $request->validate([
            'address' => ['required', 'string']
        ]);

        return new BuildingResource(
            Building::firstOrCreate([
                'address' => $validated['address']
            ])
        );
    }

    public function getBuildingApartments(Request $request, int $id): ApartmentCollection
    {
       $apartments = Building::find($id)->apartments;

       return new ApartmentCollection($apartments);
    }
}
