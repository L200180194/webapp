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
            $table->string("foto_perusahaan")->nullable();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("status_perusahaan")->default('unverif');
            $table->string("surat_perusahaan")->nullable();
            $table->timestamp("tgl_statusperusahaan")->useCurrent()->nullable();
            $table->text("deskripsi_perusahaan")->nullable();
            $table->string("notlp_perusahaan")->nullable();
            $table->foreignId('admin_id')->nullable();
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
