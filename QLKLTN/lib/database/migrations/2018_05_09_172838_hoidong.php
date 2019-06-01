<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hoidong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoidong', function (Blueprint $table) {
            $table->increments('id_hoidong');
            $table->tinyInteger('chuc_vu');
            $table->tinyInteger('ky');
            $table->tinyInteger('nhom');
            $table->integer('thanhvien_hoidong')->unsigned();
            $table->foreign('thanhvien_hoidong')
                  ->references('id')
                  ->on('thanhvien')
                  ->onDelete('cascade');
            $table->integer('nam_hoidong')->unsigned();
            $table->foreign('nam_hoidong')
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
        Schema::dropIfExists('hoidong');
    }
}
