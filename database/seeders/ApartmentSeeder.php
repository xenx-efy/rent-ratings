<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('apartments')->insert([
             'building_id' => 1,
             'number' => 12,
             'amount_of_rooms' => 2,
             'floor' => 4
         ]);

        DB::table('apartments')->insert([
            'building_id' => 2,
            'number' => 13,
            'amount_of_rooms' => 2,
            'floor' => 4
        ]);
    }
}
