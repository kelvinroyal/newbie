<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trongso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trongso', function (Blueprint $table) {
            $table->increments('id_trongso');
            $table->string('trong_so');
            $table->integer('hoidong_trongso')->unsigned();
            $table->foreign('hoidong_trongso')
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
        Schema::dropIfExists('trongso');
    }
}
