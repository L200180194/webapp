<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosisimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posisims', function (Blueprint $table) {
            $table->id();
            $table->string("nama_posisi");
            $table->string("foto_posisi");
            $table->text("persyaratan_posisi");
            $table->text("keterangan_posisi");
            $table->text("fasilitas_posisi");
            $table->text("deskripsi_posisi");
            $table->date("deadline_posisi");
            $table->foreignId('perusahaan_id');
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
        Schema::dropIfExists('posisims');
    }
}
