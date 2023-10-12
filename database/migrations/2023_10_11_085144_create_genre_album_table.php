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
        Schema::create('genre_album', function (Blueprint $table) {
            $table->bigInteger('album_id')->index('idx_genre_album_album_id');
            $table->integer('genre_id')->index('idx_genre_album_genre_id');

            $table->primary(['album_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_album');
    }
};
