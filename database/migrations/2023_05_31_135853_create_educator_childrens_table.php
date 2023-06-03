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
        Schema::create('educator_childrens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendidik_id');
            $table->foreign('pendidik_id')->references('id')->on('pendidiks')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('nama_anak')->nullable();
            $table->string('status')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('nisn')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('tahun_masuk_sekolah')->nullable();
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
        Schema::dropIfExists('educator_childrens');
    }
};
