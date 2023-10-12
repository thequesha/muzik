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
        Schema::create('user_playlist_tracks', function (Blueprint $table) {
            $table->bigInteger('playlist_id')->index('idx_user_playlist_tracks_playlist_id');
            $table->bigInteger('track_id')->index('idx_user_playlist_tracks_track_id');

            $table->primary(['playlist_id', 'track_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_playlist_tracks');
    }
};
