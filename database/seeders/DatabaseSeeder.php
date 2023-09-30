<?php

namespace Database\Seeders;

use App;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('production')) {
            $this->call(ProdDatabaseSeeder::class);
        } else {
            $this->call(DevDatabaseSeeder::class);
        }
    }
}
