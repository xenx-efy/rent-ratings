<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws \Exception
     */
    public function run(): void
    {
        define('ACCEPTANCE_CRITERIA_COUNT', 6);

        $reviews = [
            1 =>[
                'apartment_id' => 1,
                'title' => 'Бывало и лучше, но пойдет',
                'pros' => 'Просторная и функциональная, с удобной планировкой и просторная. В квартире есть кухня со всей необходимой бытовой техникой и удобная мебель.',
                'cons' => 'Отсутствие звукоизоляции, плохое качество сантехники.',
                'advice_to_owner' => 'Было бы просто великолепно обновить сантехнику, кран и душ в ванне. Они постоянно ломаются и их надо докручивать.',
            ],
            2 => [
                'apartment_id' => 1,
                'title' => 'Неплохая квартирка',
                'pros' => 'Хорошая планировка. Мебель и бытовая техника находятся в отличном состоянии, и арендодатель всегда быстро реагирует на любые проблемы.',
                'cons' => 'Недостаточная освещенность, шумные соседи, высокие расходы на коммунальные услуги.',
                'advice_to_owner' => 'Выровнять полы, они кривые. Постоянно ходишь по квартире и проваливаешься в небольшие ямки под линолеумом.'
            ]
        ];

        foreach ($reviews as $reviewId => $review) {
            $reviewRatingSum = 0;

            // Fill review evaluation criteria items
            for ($evaluationCriteriaId = 1; $evaluationCriteriaId <= ACCEPTANCE_CRITERIA_COUNT; $evaluationCriteriaId++) {
                $rating = random_int(1, 5);

                DB::table('review_ratings')->insert([
                    'evaluation_criteria_id' => $evaluationCriteriaId,
                    'review_id' => $reviewId,
                    'rating' => $rating,
                ]);

                $reviewRatingSum += $rating;
            }

            $reviews[$reviewId]['rating'] = $reviewRatingSum / ACCEPTANCE_CRITERIA_COUNT;

            DB::table('reviews')->insert($reviews[$reviewId]);
        }
    }
}
