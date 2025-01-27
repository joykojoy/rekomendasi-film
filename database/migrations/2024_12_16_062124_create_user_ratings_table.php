<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('user_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Referensi ke tabel users
            $table->foreignId('film_id')->constrained(); // Referensi ke tabel films
            $table->decimal('rating', 2, 1); // Rating film
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_ratings');
    }
}
