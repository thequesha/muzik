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
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ["album",  "single",  "soundtrack",   "live",  "remix"])->default('album');
            $table->string('title')->index('idx_album_title');
            $table->timestamp('release_date')->useCurrent();
            $table->timestamp('added_date')->useCurrent();
            $table->string('status')->default("Wanted");
            $table->string('artwork_url');
            $table->string('thumb_url');
            $table->text('description')->nullable();
            $table->string('mbid', 200);
            $table->boolean('is_national')->default(false);
            $table->integer('show_count')->default(0);
        });
        // DB::statement("ALTER TABLE albums ADD type album_type DEFAULT 'album' NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
};
