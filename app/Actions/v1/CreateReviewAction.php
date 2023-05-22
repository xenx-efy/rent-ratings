<?php

namespace App\Actions\v1;

use App\Http\Requests\CreateReviewRequest;
use App\Models\Review;
use App\Models\ReviewMeta;
use App\Models\ReviewRating;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateReviewAction
{
    use AsAction;

    public function handle($reviewRequestParameters): void
    {
        # TODO refactor to DTO (laravel-data package)
        DB::transaction(function () use ($reviewRequestParameters) {
            # Create review
            $review = Review::create([
                'apartment_id' => $reviewRequestParameters['apartmentId'],
                'title' => $reviewRequestParameters['review']['title'],
                'pros' => $reviewRequestParameters['review']['pros'],
                'cons' => $reviewRequestParameters['review']['cons'],
                'advice_to_owner' => $reviewRequestParameters['review']['adviceToOwner'],
                'rating' => $this->calculateAvgRating($reviewRequestParameters['evaluationCriteriaItems'])
            ]);

            # Fill review evaluation criteria
            foreach ($reviewRequestParameters['evaluationCriteriaItems'] as $criteriaItem) {
                ReviewRating::create([
                    'review_id' => $review->id,
                    'evaluation_criteria_id' => $criteriaItem['id'],
                    'rating' => $criteriaItem['rating']
                ]);
            }

            # Fill review meta
            if (isset($reviewRequestParameters['apartmentMeta'])) {
                if (isset($reviewRequestParameters['apartmentMeta']['floor'])) {
                    ReviewMeta::create([
                        'review_id' => $review->id,
                        'name' => 'floor',
                        'value' => $reviewRequestParameters['apartmentMeta']['floor']
                    ]);
                }

                if (isset($reviewRequestParameters['apartmentMeta']['amountOfRooms'])) {
                    ReviewMeta::create([
                        'review_id' => $review->id,
                        'name' => 'amountOfRooms',
                        'value' => $reviewRequestParameters['apartmentMeta']['amountOfRooms']
                    ]);
                }
            }
        });
    }

    /**
     * @group Create Review
     * @param CreateReviewRequest $request
     * @return Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
     */
    public function asController(CreateReviewRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $requestParams = $request->validated();

        $this->handle($requestParams);

        return response(null, 201);
    }

    private function calculateAvgRating(array $evaluationCriteria): string
    {
        $sum = 0;
        foreach ($evaluationCriteria as $criteriaItem) {
            $sum += $criteriaItem['rating'];
        }

        return number_format($sum / count($evaluationCriteria), 1);
    }
}
