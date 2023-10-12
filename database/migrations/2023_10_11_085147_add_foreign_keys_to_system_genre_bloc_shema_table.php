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
        Schema::table('system_genre_bloc_shema', function (Blueprint $table) {
            $table->foreign(['genre_id'], 'system_genre_bloc_shema_genre_id_fkey')->references(['id'])->on('genres')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_genre_bloc_shema', function (Blueprint $table) {
            $table->dropForeign('system_genre_bloc_shema_genre_id_fkey');
        });
    }
};
