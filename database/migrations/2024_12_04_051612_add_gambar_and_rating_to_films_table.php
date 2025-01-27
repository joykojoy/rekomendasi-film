<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarAndRatingToFilmsTable extends Migration
{
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->string('gambar')->nullable(); // URL atau path gambar
            $table->decimal('rating', 3, 1)->default(0); // Rating dengan skala 0-10
        });
    }

    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn(['gambar', 'rating']);
        });
    }
}
