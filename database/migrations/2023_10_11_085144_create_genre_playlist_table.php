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
        Schema::create('genre_playlist', function (Blueprint $table) {
            $table->bigInteger('playlist_id')->index('idx_genre_playlist_playlist_id');
            $table->integer('genre_id')->index('idx_genre_playlist_genre_id');

            $table->primary(['playlist_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_playlist');
    }
};
