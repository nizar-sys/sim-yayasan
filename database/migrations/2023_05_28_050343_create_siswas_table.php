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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->cascadeOnUpdate();
            $table->string("nama");
            $table->string("nisn")->unique();
            $table->string("nis")->unique();
            $table->string("nik")->unique();
            $table->string("no_kk")->unique();
            $table->enum("jenis_kelamin", ["l", "p"]);
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("no_registrasi_akta_lahir")->unique();
            $table->string("agama");
            $table->string("kewarganegaraan");
            $table->string("kebutuhan_khusus");
            $table->string("alamat");
            $table->string("rt");
            $table->string("rw");
            $table->string("dusun");
            $table->string("kelurahan");
            $table->string("kecamatan");
            $table->string("kode_pos");
            $table->string("tempat_tinggal");
            $table->string("moda_transportasi");
            $table->string("anak_ke");
            $table->string('no_kip')->nullable();
            $table->date('tanggal_masuk_sekolah');
            $table->string('sekolah_asal');
            $table->string("no_peserta_ujian_nasional")->unique();
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
        Schema::dropIfExists('siswas');
    }
};
