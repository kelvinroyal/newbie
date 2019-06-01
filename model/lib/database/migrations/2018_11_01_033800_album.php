<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Album extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->increments('id_album');
            $table->text('content_album');
            $table->integer('model_album')->unsigned();
            $table->foreign('model_album')
                  ->references('id_model')
                  ->on('model')
                  ->onDelete('cascade');
            $table->string('name_album');
            $table->string('avatar_album');
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
        Schema::dropIfExists('album');
    }
}
