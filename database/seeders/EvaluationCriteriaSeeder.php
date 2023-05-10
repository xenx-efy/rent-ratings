<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insertValues = [
            'Отопление',
            'Соседи',
            'Уровень шума',
            'Отзывчивость хозяев',
            'Тараканы',
            'Чистота'
        ];

        foreach ($insertValues as $value) {
            DB::table('evaluation_criteria')->insert([
                'name' => $value
            ]);
        }
    }
}
