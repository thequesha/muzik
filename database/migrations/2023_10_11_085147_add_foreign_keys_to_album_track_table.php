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
        Schema::table('album_track', function (Blueprint $table) {
            $table->foreign(['album_id'], 'album_track_album_id_fkey')->references(['id'])->on('albums')->onDelete('CASCADE');
            $table->foreign(['track_id'], 'album_track_track_id_fkey')->references(['id'])->on('tracks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album_track', function (Blueprint $table) {
            $table->dropForeign('album_track_album_id_fkey');
            $table->dropForeign('album_track_track_id_fkey');
        });
    }
};
