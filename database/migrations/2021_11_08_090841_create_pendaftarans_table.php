<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->date("tgl_daftar");
            $table->timestamp("tgl_perubahanstatus")->useCurrent();
            $table->string("keterangan_daftar");
            $table->string("status_daftar");
            $table->foreignId('user_id');
            $table->foreignId('posisi_magang_id');
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
        Schema::dropIfExists('pendaftarans');
    }
}
