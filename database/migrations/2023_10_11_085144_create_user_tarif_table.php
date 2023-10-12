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
        Schema::create('user_tarif', function (Blueprint $table) {
            $table->bigInteger('user_id')->index('idx_user_tarif_user_id');
            $table->integer('tarif_id')->index('idx_user_tarif_tarif_id');
            $table->bigInteger('parent_id')->default(0);
            $table->timestamp('end_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent();

            $table->primary(['user_id', 'tarif_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tarif');
    }
};
