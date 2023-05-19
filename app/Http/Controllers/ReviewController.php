<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewPostRequest;
use App\Models\Review;
use App\Models\ReviewMeta;
use App\Models\ReviewRating;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function post(ReviewPostRequest $request)
    {
        $requestParams = $request->validated();

        DB::transaction(function () use ($requestParams) {
            # Create review
            $review = Review::create([
                'apartment_id' => $requestParams['apartmentId'],
                'title' => $requestParams['review']['title'],
                'pros' => $requestParams['review']['pros'],
                'cons' => $requestParams['review']['cons'],
                'advice_to_owner' => $requestParams['review']['adviceToOwner'],
                'rating' => $this->calculateAvgEvaluateCriteria($requestParams['evaluationCriteriaItems'])
            ]);

            # Fill review evaluation criteria
            foreach ($requestParams['evaluationCriteriaItems'] as $criteriaItem) {
                ReviewRating::create([
                    'review_id' => $review->id,
                    'evaluation_criteria_id' => $criteriaItem['id'],
                    'rating' => $criteriaItem['rating']
                ]);
            }

            # Fill review meta
            if (isset($requestParams['apartmentMeta'])) {
                if (isset($requestParams['apartmentMeta']['floor'])) {
                    ReviewMeta::create([
                        'review_id' => $review->id,
                        'name' => 'floor',
                        'value' => $requestParams['apartmentMeta']['floor']
                    ]);
                }

                if (isset($requestParams['apartmentMeta']['amountOfRooms'])) {
                    ReviewMeta::create([
                        'review_id' => $review->id,
                        'name' => 'amountOfRooms',
                        'value' => $requestParams['apartmentMeta']['amountOfRooms']
                    ]);
                }
            }
        });

        return response(null, 201);
    }

    private function calculateAvgEvaluateCriteria(array $evaluationCriteria): string
    {
        $sum = 0;
        foreach ($evaluationCriteria as $criteriaItem) {
            $sum += $criteriaItem['rating'];
        }

        return number_format($sum / count($evaluationCriteria), 1);
    }
}
