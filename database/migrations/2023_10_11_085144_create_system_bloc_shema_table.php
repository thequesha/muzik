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
        Schema::create('system_bloc_shema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('order_number');
            $table->boolean('status')->default(false);
            $table->integer('bh_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_bloc_shema');
    }
};
