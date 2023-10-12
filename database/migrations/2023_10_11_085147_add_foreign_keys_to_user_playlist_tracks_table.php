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
        Schema::table('user_playlist_tracks', function (Blueprint $table) {
            $table->foreign(['playlist_id'], 'user_playlist_tracks_playlist_id_fkey')->references(['id'])->on('user_playlists')->onDelete('CASCADE');
            $table->foreign(['track_id'], 'user_playlist_tracks_track_id_fkey')->references(['id'])->on('tracks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_playlist_tracks', function (Blueprint $table) {
            $table->dropForeign('user_playlist_tracks_playlist_id_fkey');
            $table->dropForeign('user_playlist_tracks_track_id_fkey');
        });
    }
};
