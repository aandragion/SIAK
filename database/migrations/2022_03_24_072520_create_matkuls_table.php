<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatkulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matkul', function (Blueprint $table) {
            $table->id('id_matkul');
            $table->integer('id_programstudi');
            $table->string('kode_matkul', 30);
            $table->string('nama_matkul', 50);
            $table->integer('sks');
            $table->integer('semester');
            $table->integer('id_periode');
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
        Schema::dropIfExists('matkul');
    }
}
