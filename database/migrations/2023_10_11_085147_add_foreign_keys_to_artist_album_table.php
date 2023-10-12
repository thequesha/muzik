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
        Schema::table('artist_album', function (Blueprint $table) {
            $table->foreign(['album_id'], 'artist_album_album_id_fkey')->references(['id'])->on('albums')->onDelete('CASCADE');
            $table->foreign(['artist_id'], 'artist_album_artist_id_fkey')->references(['id'])->on('artists')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artist_album', function (Blueprint $table) {
            $table->dropForeign('artist_album_album_id_fkey');
            $table->dropForeign('artist_album_artist_id_fkey');
        });
    }
};
