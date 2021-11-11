<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string("nama_perusahaan");
            $table->string("alamat_perusahaan");
            $table->string("foto_perusahaan");
            $table->string("email_perusahaan")->unique();
            $table->string("password_perusahaan");
            $table->string("status_perusahaan");
            $table->string("surat_perusahaan");
            $table->timestamp("tgl_statusperusahaan")->useCurrent();
            $table->text("deskripsi_perusahaan");
            $table->string("notlp_perusahaan");
            $table->foreignId('admin_id');
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
        Schema::dropIfExists('perusahaans');
    }
}
