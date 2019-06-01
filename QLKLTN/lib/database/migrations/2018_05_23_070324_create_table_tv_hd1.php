<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTvHd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_hd', function (Blueprint $table) {
            $table->integer('thanhvien_id')->unsigned()->nullable();
            $table->foreign('thanhvien_id')->references('id')
            ->on('thanhvien')->onDelete('cascade');
            $table->integer('khoaluan_id')->unsigned()->nullable();
            $table->foreign('khoaluan_id')->references('id_khoaluan')
            ->on('khoaluan')->onDelete('cascade');
            $table->integer('chuc_vu')->nullable();
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
        Schema::dropIfExists('tv_hd');
    }
}
