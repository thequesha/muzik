<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->index('idx_payments_user_id');
            $table->enum(
                'method',
                [
                    "cash",
                    "tfeb",
                    "senagat",
                    "halk",
                    "rysgal",
                    "gift_cart",
                    "other_bank",
                ]
            );
            $table->integer('pay_summ');
            $table->ipAddress('ip_address')->nullable();
            $table->text('header_user')->nullable();
            $table->text('payment_code')->nullable();
            $table->boolean('status')->default(false);
            $table->text('description')->default('');
            $table->timestamp('created_date')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
