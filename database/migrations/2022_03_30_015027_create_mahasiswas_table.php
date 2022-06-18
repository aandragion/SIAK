<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('id_mhs');
            $table->string('nim', 30);
            $table->string('nama_mhs', 30);
            $table->string('tempat_lahir', 30);
            $table->string('tgl_lahir', 30);
            $table->string('jns_kelamin', 30);
            $table->string('agama', 30);
            $table->integer('id_programstudi');
            $table->string('angkatan', 30);
            $table->string('no_tlp', 30);
            $table->string('alamat', 100);
            $table->string('rt', 30);
            $table->string('rw', 30);
            $table->string('dusun', 30);
            $table->string('kelurahan', 30);
            $table->string('kecamatan', 30);
            $table->string('kode_pos', 30);
            $table->string('jns_tinggal', 50);
            $table->string('alat_tranportasi', 50);
            $table->string('email', 30);
            $table->string('nik', 30);
            $table->string('nisn', 30);
            $table->string('npwp', 30);
            $table->string('kewarganegaraan', 30);
            $table->string('photo', 50);
            $table->string('status', 30);
            $table->string('anak_ke', 30);
            $table->string('jml_saudara', 30);
            $table->integer('id_jalurmasuk');
            $table->string('kps', 30);
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
        Schema::dropIfExists('mahasiswa');
    }
}
