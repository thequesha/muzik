<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_track', function (Blueprint $table) {
            $table->bigInteger('track_id')->index('idx_genre_track_track_id');
            $table->integer('genre_id')->index('idx_genre_track_genre_id');

            $table->primary(['track_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_track');
    }
};
