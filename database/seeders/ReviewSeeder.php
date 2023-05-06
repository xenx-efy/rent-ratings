<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'apartment_id' => 1,
            'pros' => 'Просторная и функциональная, с удобной планировкой и просторная. В квартире есть кухня со всей необходимой бытовой техникой и удобная мебель.',
            'cons' => 'Отсутствие звукоизоляции, плохое качество сантехники.',
            'advice_to_owner' => 'Было бы просто великолепно обновить сантехнику, кран и душ в ванне. Они постоянно ломаются и их надо докручивать.'
        ]);

        DB::table('reviews')->insert([
            'apartment_id' => 1,
            'pros' => 'Хорошая планировка. Мебель и бытовая техника находятся в отличном состоянии, и арендодатель всегда быстро реагирует на любые проблемы.',
            'cons' => 'Недостаточная освещенность, шумные соседи, высокие расходы на коммунальные услуги.',
            'advice_to_owner' => 'Выровнять полы, они кривые. Постоянно ходишь по квартире и проваливаешься в небольшие ямки под линолеумом.'
        ]);
    }
}
