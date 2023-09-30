<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            BuildingSeeder::class,
            ApartmentSeeder::class,
            ReviewSeeder::class,
            EvaluationCriteriaSeeder::class
        ]);
    }
}
