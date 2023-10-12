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
        Schema::create('user_session', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->index('idx_session_user_id');
            $table->text('session_token')->index('idx_session_user_session_token_id');
            $table->ipAddress('ip_address');
            $table->text('device_info');
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('last_active_time')->useCurrent();
            $table->boolean('is_banned')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_session');
    }
};
