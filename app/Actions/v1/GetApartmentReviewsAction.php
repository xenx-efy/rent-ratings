<?php

namespace App\Actions\v1;

use App\Http\Resources\ReviewCollection;
use App\Models\Apartment;
use Lorisleiva\Actions\Concerns\AsAction;

class GetApartmentReviewsAction
{
    use AsAction;

    public function handle(int $apartmentId)
    {
        return Apartment::findOrFail($apartmentId)->reviews;
    }

    public function asController(int $id): ReviewCollection
    {
        return new ReviewCollection($this->handle($id));
    }
}
