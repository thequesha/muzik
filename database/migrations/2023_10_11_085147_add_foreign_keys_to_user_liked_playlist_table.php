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
        Schema::table('user_liked_playlist', function (Blueprint $table) {
            $table->foreign(['playlist_id'], 'user_liked_playlist_playlist_id_fkey')->references(['id'])->on('playlists')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'user_liked_playlist_user_id_fkey')->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_liked_playlist', function (Blueprint $table) {
            $table->dropForeign('user_liked_playlist_playlist_id_fkey');
            $table->dropForeign('user_liked_playlist_user_id_fkey');
        });
    }
};
