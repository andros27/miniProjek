<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->increments('id_request');
            $table->foreign('id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
                  ->onUpdate('cascade');
            $table->text('message');
            $table->enum('type', ['kritik','saran']);
            $table->foreign('id_status')
                  ->references('id_status')->on('status')
                  ->onDelete('cascade');
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('request');
    }
}
