<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            EvaluationCriteriaSeeder::class
        ]);

    }
}
