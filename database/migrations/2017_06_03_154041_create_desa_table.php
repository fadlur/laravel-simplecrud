<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_desa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');//ada kodenya juga
            $table->string('nama');//nama desanya juga
            $table->integer('kecamatan_id')->unsigned();//foreign key ke table kecamatan
            $table->foreign('kecamatan_id')->references('id')->on('tbl_kecamatan');
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
        Schema::dropIfExists('tbl_desa');
    }
}
