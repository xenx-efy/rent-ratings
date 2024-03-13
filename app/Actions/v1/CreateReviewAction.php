<?php

namespace App\Actions\v1;

use App\Http\Requests\CreateReviewRequest;
use App\Models\Review;
use App\Models\ReviewMeta;
use App\Models\ReviewRating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateReviewAction
{
    use AsAction;

    public function handle($reviewParameters): void
    {
        # TODO refactor to DTO (laravel-data package)
        DB::transaction(function () use ($reviewParameters) {
            # Create review
            $review = Review::create([
                'apartment_id' => $reviewParameters['apartmentId'],
                'title' => $reviewParameters['review']['title'],
                'pros' => $reviewParameters['review']['pros'],
                'cons' => $reviewParameters['review']['cons'],
                'advice_to_owner' => $reviewParameters['review']['adviceToOwner'],
                'rating' => $this->calculateAvgRating($reviewParameters['evaluationCriteriaItems'])
            ]);

            # Fill review evaluation criteria
            foreach ($reviewParameters['evaluationCriteriaItems'] as $criteriaItem) {
                ReviewRating::create([
                    'review_id' => $review->id,
                    'evaluation_criteria_id' => $criteriaItem['id'],
                    'rating' => $criteriaItem['rating']
                ]);
            }

            # Fill review meta
            if (isset($reviewParameters['apartmentMeta'])) {
                if (isset($reviewParameters['apartmentMeta']['floor'])) {
                    ReviewMeta::create([
                        'review_id' => $review->id,
                        'name' => 'floor',
                        'value' => $reviewParameters['apartmentMeta']['floor']
                    ]);
                }

                if (isset($reviewParameters['apartmentMeta']['amountOfRooms'])) {
                    ReviewMeta::create([
                        'review_id' => $review->id,
                        'name' => 'amountOfRooms',
                        'value' => $reviewParameters['apartmentMeta']['amountOfRooms']
                    ]);
                }
            }
        });
    }

    /**
     * @group Create Review
     * @param CreateReviewRequest $request
     * @return RedirectResponse
     */
    public function asController(CreateReviewRequest $request): \Illuminate\Http\RedirectResponse
    {
        $requestParams = $request->validated();

        if ($request->has('apartmentId')) {
            $this->handle($requestParams);
        }

        // TODO Разнести эти проверки по разным классам
        if ($request->has(['buildingId', 'apartmentNumber'])) {
            $apartment = CreateApartmentAction::run($request->get('buildingId'), $request->get('apartmentNumber'));

            unset($requestParams['buildingId'], $requestParams['apartmentNumber']);
            $requestParams['apartmentId'] = $apartment->id;

            $this->handle($requestParams);
        }

        return to_route("apartment", ['id' => $requestParams['apartmentId'], 'review_created' => true]);
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
