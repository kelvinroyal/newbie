<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Video extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('id_video');
            $table->text('embed');
            $table->integer('model_video')->unsigned();
            $table->foreign('model_video')
                  ->references('id_model')
                  ->on('model')
                  ->onDelete('cascade');
            $table->string('avatar_video');
            $table->string('download');
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
        Schema::dropIfExists('video');
    }
}
