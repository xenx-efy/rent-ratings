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
        Schema::create('review_ratings', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_criteria_id');
            $table->foreignId('review_id');
            $table->enum('rating', [1,2,3,4,5]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_ratings');
    }
};
