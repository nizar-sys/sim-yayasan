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
        Schema::create('riwayat_pendidikan_formal_pendidiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendidik_id');
            $table->foreign('pendidik_id')->references('id')->on('pendidiks')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('bidang_studi')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('gelar_akademik')->nullable();
            $table->string('satuan_pendidikan')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('kependidikan')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('nis_nim')->nullable();
            $table->string('masih_studi')->nullable();
            $table->string('semester')->nullable();
            $table->string('rata_rata_nilai_ipk')->nullable();
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
        Schema::dropIfExists('riwayat_pendidikan_formal_pendidiks');
    }
};
