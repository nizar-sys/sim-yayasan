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
        Schema::create('educator_carriers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendidik_id');
            $table->foreign('pendidik_id')->references('id')->on('pendidiks')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('jenis_lembaga')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('jenis_ptk')->nullable();
            $table->string('lembaga_pengangkat')->nullable();
            $table->string('no_sk_kerja')->nullable();
            $table->date('tgl_sk_kerja')->nullable();
            $table->string('tmt_kerja')->nullable();
            $table->string('tst_kerja')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('mapel_diajarkan')->nullable();
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
        Schema::dropIfExists('educator_carriers');
    }
};
