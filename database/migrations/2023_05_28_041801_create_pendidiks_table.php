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
        Schema::create('pendidiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('nama');
            $table->string('nik_paspor')->unique();
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nama_ibu_kandung');
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
        Schema::dropIfExists('pendidiks');
    }
};
