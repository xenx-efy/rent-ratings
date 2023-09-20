<?php

namespace App\Console\Commands;

use App\Models\Apartment;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class SetRoomsAndFloor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-rooms-and-floor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the floor and number of rooms for the apartment based on the data provided in the feedback.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Apartment::chunk(10, static function (Collection $apartments) {
            foreach ($apartments as $apartment) {
//                $apartment->reviews()
            }
        });
    }
}
