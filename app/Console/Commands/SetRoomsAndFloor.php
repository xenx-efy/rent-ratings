<?php

namespace App\Console\Commands;

use App\Enums\ReviewMetaName;
use App\Models\Apartment;
use App\Models\Review;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        Apartment::with('reviews.meta')->chunk(10, function (Collection $apartments) {
            foreach ($apartments as $apartment) {
                if ($this->isApartmentHasNoReviews($apartment)) {
                    continue;
                }

                [$floorValues, $amountOfRoomsValues] = $this->collectMetaValuesFromReviews($apartment->reviews);

                if (!empty($floorValues) && !empty($amountOfRoomsValues)) {
                    $this->saveValuesToApartment($apartment,
                        $this->getMostOccurrence($amountOfRoomsValues),
                        $this->getMostOccurrence($floorValues));
                }
            }
        });
    }

    private function isApartmentHasNoReviews(Apartment $apartment): bool
    {
        return $apartment->reviews()->count() === 0;
    }

    private function getReviewMetaModelByName(Review $review, ReviewMetaName $metaName): Model|HasMany|null
    {
        return $review->meta()->firstWhere('name', $metaName->value);
    }

    private function collectMetaValuesFromReviews(Collection $reviews): array
    {
        $floorValues = [];
        $amountOfRoomsValues = [];

        foreach ($reviews as $review) {
            $reviewMetaFloor = $this->getReviewMetaModelByName($review, ReviewMetaName::Floor);
            $reviewMetaAmountOfRooms = $this->getReviewMetaModelByName($review, ReviewMetaName::AmountOfRooms);

            if (!$reviewMetaFloor || !$reviewMetaAmountOfRooms) {
                continue;
            }

            $floorValues[] = (int)$reviewMetaFloor->value;
            $amountOfRoomsValues[] = (int)$reviewMetaAmountOfRooms->value;
        }

        return [$floorValues, $amountOfRoomsValues];
    }

    /**
     * Подсчитывает наибольшее количество числовых вхождений в массиве и возвращает самое большое
     *
     * @param array<int> $numbersList
     */
    private function getMostOccurrence(array $numbersList): int
    {
        $countValues = array_count_values($numbersList);

        arsort($countValues);

        return (int)array_keys($countValues)[0];
    }

    private function saveValuesToApartment(Apartment $apartment, int $amountOfRooms, int $floor)
    {
        $apartment->amount_of_rooms = $amountOfRooms;
        $apartment->floor = $floor;
        $apartment->save();
    }

}
