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
        Schema::table('user_tarif_history', function (Blueprint $table) {
            $table->foreign(['tarif_id'], 'user_tarif_history_tarif_id_fkey')->references(['id'])->on('tarifs')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'user_tarif_history_user_id_fkey')->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_tarif_history', function (Blueprint $table) {
            $table->dropForeign('user_tarif_history_tarif_id_fkey');
            $table->dropForeign('user_tarif_history_user_id_fkey');
        });
    }
};
