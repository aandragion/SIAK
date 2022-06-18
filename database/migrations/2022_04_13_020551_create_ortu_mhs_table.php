<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrtuMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('ortu_mhs', function (Blueprint $table) {
            $table->id('id_ortumhs');
            $table->integer('id_mhs');
            $table->string('nik_ayah', 30);
            $table->string('nama_ayah', 100);
            $table->string('tgllhr_ayah', 30);
            $table->string('pendidikan_ayah', 50);
            $table->string('kerja_ayah', 50);
            $table->string('hsl_ayah', 50);
            $table->string('nik_ibu', 30);
            $table->string('nama_ibu', 100);
            $table->string('tgllhr_ibu', 30);
            $table->string('pendidikan_ibu', 50);
            $table->string('kerja_ibu', 50);
            $table->string('hsl_ibu', 50);
            $table->string('nama_wali', 100);
            $table->string('tgllhr_wali', 30);
            $table->string('pendidikan_wali', 50);
            $table->string('kerja_wali', 50);
            $table->string('hsl_wali', 50);
            $table->string('alamat_ortu', 100);
            $table->string('alamat_wali', 100);
            $table->string('tlp_ortu', 20);
            $table->string('tlp_wali', 20);
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
        Schema::dropIfExists('ortu_mhs');
    }
}
