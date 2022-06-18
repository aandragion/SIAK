<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_mhs', function (Blueprint $table) {
            $table->id('id_pdmhs');
            $table->integer('id_mhs');
            $table->string('nama_sekolah', 100);
            $table->string('alamat_sekolah', 500);
            $table->string('tlp_sekolah', 20);
            $table->string('npsn', 20);
            $table->string('status_sekolah', 20);
            $table->string('jurusan_sekolah', 100);
            $table->string('organisasi', 100);
            $table->string('prestasi', 100);
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
        Schema::dropIfExists('pendidikan_mhs');
    }
}
