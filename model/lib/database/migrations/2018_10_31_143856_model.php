<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Model extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->increments('id_model');
            $table->string('name_model');
            $table->integer('continents_model')->unsigned();
            $table->foreign('continents_model')
                  ->references('id_continents')
                  ->on('continents')
                  ->onDelete('cascade');
            $table->integer('nation_model')->unsigned();
            $table->foreign('nation_model')
                  ->references('id_nation')
                  ->on('nation')
                  ->onDelete('cascade');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->text('info_model');
            $table->tinyInteger('status');
            $table->string('avatar_model');
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
        Schema::dropIfExists('model');
    }
}
