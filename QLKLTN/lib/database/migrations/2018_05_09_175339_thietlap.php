<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thietlap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thietlap', function (Blueprint $table) {
            $table->increments('id_thietlap')->unsigned();
            $table->tinyInteger('ky');
            $table->tinyInteger('nhom');
            $table->integer('nam_thietlap')->unsigned();
            $table->foreign('nam_thietlap')
                  ->references('id_nam')
                  ->on('nam')
                  ->onDelete('cascade');
            $table->integer('hoidong_thietlap')->unsigned();
            $table->foreign('hoidong_thietlap')
                  ->references('id_hoidong')
                  ->on('hoidong')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('thietlap');
    }
}
