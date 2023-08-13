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
            'apartmentId' => ['required_without:buildingId', 'missing_with:buildingId', 'integer'],

            'buildingId' => ['required_without:apartmentId', 'required_with:apartmentNumber', 'missing_with:apartmentId', 'integer'],
            'apartmentNumber' => ['required_with:buildingId', 'missing_with:apartmentId', 'integer'],

            # Apartment Meta
            'apartmentMeta' => ['array'],
            'apartmentMeta.amountOfRooms' => ['integer'],
            'apartmentMeta.floor' => ['integer'],

            # Evaluation criteria items
            'evaluationCriteriaItems' => ['required', 'array'],
            'evaluationCriteriaItems.*.id' => ['required', 'integer'],
            'evaluationCriteriaItems.*.rating' => ['required', 'integer'],

            # Review
            'review' => ['required', 'array'],
            'review.title' => ['required', 'string'],
            'review.pros' => ['required', 'string'],
            'review.cons' => ['required', 'string'],
            'review.adviceToOwner' => ['required', 'string']
        ];
    }
}
