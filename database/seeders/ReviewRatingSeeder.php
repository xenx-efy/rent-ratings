<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        define('ACCEPTANCE_CRITERIA_COUNT', 6);

        for ($reviewId = 1; $reviewId <= 5; $reviewId++) {
            for ($evaluationCriteriaId = 1; $evaluationCriteriaId <= ACCEPTANCE_CRITERIA_COUNT; $evaluationCriteriaId++) {
                DB::table('review_ratings')->insert([
                    'evaluation_criteria_id' => $evaluationCriteriaId,
                    'review_id' => $reviewId,
                    'rating' => random_int(1, 5),
                ]);
            }
        }
    }
}
