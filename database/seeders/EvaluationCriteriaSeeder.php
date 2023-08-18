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
            'Отопление' => '1 плохо работает - 5 работает',
            'Соседи' => '1 шумные - 5 дружелюбные',
            'Уровень шума' => '1 шумно - 5 тихо',
            'Отзывчивость хозяев' => '1 отсутствует - 5 своевременная',
            'Тараканы' => '1 много - 5 отсутствуют',
            'Чистота' => '1 грязно - 5 чисто'
        ];


        foreach ($insertValues as $criteria => $description) {
            DB::table('evaluation_criteria')->insert([
		    'name' => $criteria,
		    'description' => $description
            ]);
        }
    }
}
