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
        Schema::create('system_genre_bloc_shema_artist', function (Blueprint $table) {
            $table->integer('artist_id');
            $table->integer('system_bloc_shem_id');

            $table->primary(['artist_id', 'system_bloc_shem_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_genre_bloc_shema_artist');
    }
};
