<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id');
            $table->text('pros')->comment('Positive aspects of apartment');
            $table->text('cons')->comment('Negative aspects of apartment');
            $table->text('advice_to_owner')->comment('Advice of ex renter to apartment owner');
            $table->float('rating', 8, 1)->comment('Average evaluation criteria rating of comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
