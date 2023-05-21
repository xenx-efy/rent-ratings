<?php

namespace App\Actions\v1;

use App\Http\Resources\EvaluationCriteriaCollection;
use App\Models\EvaluationCriteria;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetEvaluationCriteriaAction
{
    use AsAction;

    public function handle(): Collection
    {
        return EvaluationCriteria::all();
    }

    public function asController(): EvaluationCriteriaCollection
    {
        return new EvaluationCriteriaCollection($this->handle());
    }
}
