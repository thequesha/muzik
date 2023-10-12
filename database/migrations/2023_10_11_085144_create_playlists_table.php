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
        Schema::create('playlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_tm')->index('idx_playlist_title_tm');
            $table->string('title_ru')->index('idx_playlist_title_ru');
            $table->boolean('status')->default(false);
            $table->string('artwork_url')->default('');
            $table->string('thumb_url')->default('');
            $table->integer('show_count')->default(0);
            $table->timestamp('created_date')->useCurrent();
            $table->text('description_tm')->default('');
            $table->text('description_ru')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlists');
    }
};
