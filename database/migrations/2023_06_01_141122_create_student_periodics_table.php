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
        Schema::create('student_periodics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('lingkar_kepala');
            $table->string('jarak_ke_sekolah');
            $table->string('waktu_tempuh');
            $table->string('jumlah_saudara_kandung');
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
        Schema::dropIfExists('student_periodics');
    }
};
