<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unique(['building_id', 'number']);
            $table->foreignId('building_id');
            $table->unsignedInteger('number')->comment('Number of apartment in building.');
            $table->unsignedInteger('amount_of_rooms')->nullable()->comment('Amount of rooms in the apartment.');
            $table->unsignedInteger('floor')->nullable()->comment('The floor on which the apartment is located');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
