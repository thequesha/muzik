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
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100)->index('idx_track_title');
            $table->integer('duration');
            $table->integer('track_number')->default(1);
            $table->integer('bit_rate');
            $table->text('lyrics')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('mbid', 200)->default('');
            $table->boolean('is_national')->default(false);
            $table->string('thumb_url')->nullable();
            $table->string('artwork_url')->nullable();
            $table->softDeletes();
            $table->integer('listen_count')->default(0);
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
        Schema::dropIfExists('tracks');
    }
};
