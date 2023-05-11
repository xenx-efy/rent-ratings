<?php

namespace App\Http\Controllers;

use App\Http\Resources\EvaluationCriteriaCollection;
use App\Http\Resources\EvaluationCriteriaResource;
use App\Models\EvaluationCriteria;
use Illuminate\Http\Request;

class EvaluationCriteriaController extends Controller
{
    public function get(Request $request): EvaluationCriteriaCollection
    {
        return new EvaluationCriteriaCollection(EvaluationCriteria::all());
    }
}
