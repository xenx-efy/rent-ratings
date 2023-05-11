<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Collection;

class EvaluationCriteriaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    #[ArrayShape(['data' => Collection::class])] public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }


}
