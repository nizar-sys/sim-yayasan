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
        Schema::create('parent_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade')->cascadeOnUpdate();
            $table->enum('sebagai', ['ayah', 'ibu', 'wali']);
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tanggal_lahir');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('penghasilan_bulanan');
            $table->string('berkebutuhan_khusus');
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
        Schema::dropIfExists('parent_students');
    }
};
