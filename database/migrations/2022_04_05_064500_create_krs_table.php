<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('krs', function (Blueprint $table) {
            $table->id('id_krs');
            $table->integer('id_jadwal');
            $table->integer('id_mhs');
            $table->integer('id_snilai');
            $table->string('uts', 30);
            $table->string('uas', 30);
            $table->string('tugas', 30);
            $table->string('status', 30);
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
        Schema::dropIfExists('krs');
    }
}
