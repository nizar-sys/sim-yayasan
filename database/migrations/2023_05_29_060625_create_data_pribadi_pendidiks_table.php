<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pribadi_pendidiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendidik_id');
            $table->foreign('pendidik_id')->references('id')->on('pendidiks')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('alamat_jalan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->integer('no_kk')->nullable();
            $table->string('agama')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('nip_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
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
        Schema::dropIfExists('data_pribadi_pendidiks');
    }
};
