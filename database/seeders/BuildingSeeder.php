<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buildings')->insert([
           'address' => fake()->address(),
        ]);

        DB::table('buildings')->insert([
            'address' => fake()->address(),
        ]);
    }
}
