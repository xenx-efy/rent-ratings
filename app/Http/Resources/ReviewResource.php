<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'rating' => $this->rating,
            'pros' => $this->pros,
            'cons' => $this->cons,
            'adviceToOwner' => $this->advice_to_owner
        ];
    }
}
