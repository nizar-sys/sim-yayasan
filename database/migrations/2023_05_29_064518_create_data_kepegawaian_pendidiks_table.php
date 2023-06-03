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
        Schema::create('data_kepegawaian_pendidiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendidik_id');
            $table->foreign('pendidik_id')->references('id')->on('pendidiks')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('status_kepegawaian')->nullable();
            $table->string('nip')->nullable();
            $table->string('niy_nigk')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('jenis_ptk')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->string('tmt_pengangkatan')->nullable();
            $table->string('lembaga_pengangkat')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->string('tmt_cpns')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->string('kartu_pegawai')->nullable();
            $table->string('kartu_pasangan')->nullable();
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
        Schema::dropIfExists('data_kepegawaian_pendidiks');
    }
};
