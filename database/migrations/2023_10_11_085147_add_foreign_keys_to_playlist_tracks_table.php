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
        Schema::table('playlist_tracks', function (Blueprint $table) {
            $table->foreign(['playlist_id'], 'playlist_tracks_playlist_id_fkey')->references(['id'])->on('playlists')->onDelete('CASCADE');
            $table->foreign(['track_id'], 'playlist_tracks_track_id_fkey')->references(['id'])->on('tracks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playlist_tracks', function (Blueprint $table) {
            $table->dropForeign('playlist_tracks_playlist_id_fkey');
            $table->dropForeign('playlist_tracks_track_id_fkey');
        });
    }
};
