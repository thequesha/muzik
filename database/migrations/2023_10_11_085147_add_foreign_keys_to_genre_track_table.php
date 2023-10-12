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
        Schema::table('genre_track', function (Blueprint $table) {
            $table->foreign(['genre_id'], 'genre_track_genre_id_fkey')->references(['id'])->on('genres')->onDelete('CASCADE');
            $table->foreign(['track_id'], 'genre_track_track_id_fkey')->references(['id'])->on('tracks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genre_track', function (Blueprint $table) {
            $table->dropForeign('genre_track_genre_id_fkey');
            $table->dropForeign('genre_track_track_id_fkey');
        });
    }
};
