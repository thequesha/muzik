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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone', 20)->index('idx_username');
            $table->string('recovery_phone', 50)->nullable();
            $table->string('email')->nullable()->unique('users_email_key');
            $table->integer('age')->default(0);
            $table->string('name')->nullable();
            $table->timestamp('joined_date')->nullable()->useCurrent();
            $table->enum('lang', ['tm', 'ru'])->default('tm');
            $table->enum('gender', ['none', 'male', 'female'])->default('none');

            $table->unique(['phone'], 'users_phone_key');
        });
        // DB::statement("ALTER TABLE users ADD gender gender DEFAULT 'none' NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
