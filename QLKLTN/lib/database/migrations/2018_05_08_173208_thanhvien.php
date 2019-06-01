<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thanhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhvien', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('ma_thanhvien');
            $table->string('ten_thanhvien');
            $table->string('password');
            $table->string('anh');
            $table->tinyInteger('quyen');
            $table->integer('khoa_thanhvien')->unsigned();
            $table->foreign('khoa_thanhvien')
                  ->references('id_khoa')
                  ->on('khoa')
                  ->onDelete('cascade');
            $table->integer('nganh_thanhvien')->unsigned();
            $table->foreign('nganh_thanhvien')
                  ->references('id_nganh')
                  ->on('nganh')
                  ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('thanhvien');
    }
}
