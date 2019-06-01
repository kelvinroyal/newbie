<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Khoaluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoaluan', function (Blueprint $table) {
            $table->increments('id_khoaluan')->unsigned();
            $table->string('de_tai');
            $table->datetime('thoi_gian');
            $table->integer('thanhvien_khoaluan')->unsigned();
            $table->foreign('thanhvien_khoaluan')
                  ->references('id')
                  ->on('thanhvien')
                  ->onDelete('cascade');
            $table->tinyInteger('diem1');
            $table->tinyInteger('diem2');
            $table->tinyInteger('diem3');
            $table->tinyInteger('diem4');
            $table->integer('trongso_khoaluan')->unsigned();
            $table->foreign('trongso_khoaluan')
                  ->references('id_trongso')
                  ->on('trongso')
                  ->onDelete('cascade');
            $table->integer('khoa_khoaluan')->unsigned();
            $table->foreign('khoa_khoaluan')
                  ->references('id_khoa')
                  ->on('khoa')
                  ->onDelete('cascade');
            $table->integer('nam_khoaluan')->unsigned();
            $table->foreign('nam_khoaluan')
                  ->references('id_nam')
                  ->on('nam')
                  ->onDelete('cascade');
            $table->tinyInteger('ky');
            $table->tinyInteger('nhom');
            $table->string('bao_cao');
            $table->integer('nganh_khoaluan')->unsigned();
            $table->foreign('nganh_khoaluan')
                  ->references('id_nganh')
                  ->on('nganh')
                  ->onDelete('cascade');
            $table->integer('id_thietlap')->unsigned();
            $table->foreign('id_thietlap')
                  ->references('id_thietlap')
                  ->on('thietlap')
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
        Schema::dropIfExists('khoaluan');
    }
}
