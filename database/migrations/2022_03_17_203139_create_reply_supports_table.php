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
        Schema::create('reply_support', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('support_id')->index();
            $table->foreign('support_id')->references('id')->on('supports');
            $table->uuid('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->uuid('admin_id')->index()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_supports');
    }
};
