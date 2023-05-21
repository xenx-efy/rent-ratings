<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'apartmentId' => ['required', 'numeric'],

            # Apartment Meta
            'apartmentMeta' => ['array'],
            'apartmentMeta.amountOfRooms' => ['numeric'],
            'apartmentMeta.floor' => ['numeric'],


            # Evaluation criteria items
            'evaluationCriteriaItems' => ['required', 'array'],
            'evaluationCriteriaItems.*.id' => ['required', 'numeric'],
            'evaluationCriteriaItems.*.rating' => ['required', 'numeric'],

            # Review
            'review' => ['required', 'array'],
            'review.title' => ['required', 'string'],
            'review.pros' => ['required', 'string'],
            'review.cons' => ['required', 'string'],
            'review.adviceToOwner' => ['required', 'string']
        ];
    }
}
