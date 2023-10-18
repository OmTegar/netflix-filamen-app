<?php

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('film_genres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Film::class);
            $table->foreignIdFor(Genre::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_genres');
    }
};
