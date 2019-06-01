<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detai', function (Blueprint $table) {
            $table->increments('id_detai');
            $table->string('ten_detai');
            $table->integer('thanhvien_detai')->unsigned();
            $table->foreign('thanhvien_detai')
                  ->references('id')
                  ->on('thanhvien')
                  ->onDelete('cascade');
            $table->integer('nam_detai')->unsigned();
            $table->foreign('nam_detai')
                  ->references('id_nam')
                  ->on('nam')
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
        Schema::dropIfExists('detai');
    }
}
