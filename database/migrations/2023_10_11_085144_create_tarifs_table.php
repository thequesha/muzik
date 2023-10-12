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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_tm');
            $table->string('name_ru');
            $table->text('description_tm');
            $table->text('description_ru');
            $table->integer('price');
            $table->integer('session_count');
            $table->integer('day_count');
            $table->integer('additional_session_count')->default(0);
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('last_updated_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifs');
    }
};
