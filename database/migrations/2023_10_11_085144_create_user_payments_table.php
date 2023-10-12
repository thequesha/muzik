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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->index('idx_user_payments_user_id');
            $table->integer('tarif_id')->nullable()->index('idx_user_payments_tarif_id');
            $table->bigInteger('payment_id')->nullable();
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('from_date')->useCurrent();
            $table->timestamp('to_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_payments');
    }
};
