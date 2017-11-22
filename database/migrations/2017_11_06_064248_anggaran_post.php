<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnggaranPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_post', function (Blueprint $table){
          $table->increments('id');
          $table->string('kategori');
          $table->string('laporan');
          $table->integer('biaya_konsumsi');
          $table->integer('biaya_transport');
          $table->integer('biaya_penginapan');
          $table->string('nama_penanggungjawab');
          $table->string('nip_penanggungjawab');
          $table->integer('verifikasi')->nullable();
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
        Schema::drop('anggaran_post');
    }
}
