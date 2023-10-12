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
        Schema::table('artist_track', function (Blueprint $table) {
            $table->foreign(['artist_id'], 'artist_track_artist_id_fkey')->references(['id'])->on('artists')->onDelete('CASCADE');
            $table->foreign(['track_id'], 'artist_track_track_id_fkey')->references(['id'])->on('tracks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artist_track', function (Blueprint $table) {
            $table->dropForeign('artist_track_artist_id_fkey');
            $table->dropForeign('artist_track_track_id_fkey');
        });
    }
};
