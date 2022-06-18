<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('nik', 30);
            $table->string('nidn', 30);
            $table->string('nama_dosen', 30);
            $table->string('jabatan', 30);
            $table->string('jns_kelamin_dsn', 30);
            $table->string('tempat_lahir_dsn', 30);
            $table->string('tgl_lahir_dsn', 30);
            $table->string('alamat_dsn', 30);
            $table->string('tlp_dsn', 30);
            $table->string('pendidikan', 30);
            $table->string('photo_dsn', 30);
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
        Schema::dropIfExists('dosen');
    }
}
