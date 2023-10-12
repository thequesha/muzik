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
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index('idx_artist_name');
            $table->timestamp('added_date')->useCurrent();
            $table->timestamp('last_update')->useCurrent();
            $table->text('bio_tk')->nullable();
            $table->text('bio_ru')->nullable();
            $table->string('artwork_url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->integer('country_id')->nullable()->index('idx_artist_country_id');
            $table->boolean('status')->default(false);
            $table->string('mbid', 200)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
};
