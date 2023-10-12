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
        Schema::table('user_payments', function (Blueprint $table) {
            $table->foreign(['payment_id'], 'user_payments_payment_id_fkey')->references(['id'])->on('payments')->onDelete('CASCADE');
            $table->foreign(['tarif_id'], 'user_payments_tarif_id_fkey')->references(['id'])->on('tarifs')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'user_payments_user_id_fkey')->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_payments', function (Blueprint $table) {
            $table->dropForeign('user_payments_payment_id_fkey');
            $table->dropForeign('user_payments_tarif_id_fkey');
            $table->dropForeign('user_payments_user_id_fkey');
        });
    }
};
