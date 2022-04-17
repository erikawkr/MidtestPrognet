<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhans', function (Blueprint $table) {
            $table->id();
            $table->text('keluhan_user')->nullable();
            $table->text('respond_admin')->nullable();
            $table->unsignedBiginteger('user_id')->unsignedBiginteger();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBiginteger('admin_id')->unsignedBiginteger();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('is_reply')->nullable();
            $table->datetime('tanggal')->nullable();
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
        Schema::dropIfExists('keluhans');
    }
}
