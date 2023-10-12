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
        Schema::table('genre_album', function (Blueprint $table) {
            $table->foreign(['album_id'], 'genre_album_album_id_fkey')->references(['id'])->on('albums')->onDelete('CASCADE');
            $table->foreign(['genre_id'], 'genre_album_genre_id_fkey')->references(['id'])->on('genres')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genre_album', function (Blueprint $table) {
            $table->dropForeign('genre_album_album_id_fkey');
            $table->dropForeign('genre_album_genre_id_fkey');
        });
    }
};
