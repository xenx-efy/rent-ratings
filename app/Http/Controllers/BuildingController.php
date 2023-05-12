<?php

namespace App\Http\Controllers;

use App\Http\Resources\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function findOrCreate(Request $request)
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
}
