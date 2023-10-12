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
        Schema::create('genre_bloc_shema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('genre_id')->nullable();
            $table->json('body');
            $table->integer('order_number');
            $table->boolean('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_bloc_shema');
    }
};
