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
        Schema::table('system_bloc_shema_album', function (Blueprint $table) {
            $table->foreign(['album_id'], 'system_bloc_shema_album_album_id_fkey')->references(['id'])->on('albums')->onDelete('CASCADE');
            $table->foreign(['system_bloc_shem_id'], 'system_bloc_shema_album_system_bloc_shem_id_fkey')->references(['id'])->on('system_bloc_shema')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_bloc_shema_album', function (Blueprint $table) {
            $table->dropForeign('system_bloc_shema_album_album_id_fkey');
            $table->dropForeign('system_bloc_shema_album_system_bloc_shem_id_fkey');
        });
    }
};
