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
        Schema::table('user_liked_album', function (Blueprint $table) {
            $table->foreign(['album_id'], 'user_liked_album_album_id_fkey')->references(['id'])->on('albums')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'user_liked_album_user_id_fkey')->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_liked_album', function (Blueprint $table) {
            $table->dropForeign('user_liked_album_album_id_fkey');
            $table->dropForeign('user_liked_album_user_id_fkey');
        });
    }
};
