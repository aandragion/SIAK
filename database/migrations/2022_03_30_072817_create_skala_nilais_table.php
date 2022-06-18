<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkalaNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skala_nilai', function (Blueprint $table) {
            $table->id('id_snilai');
            $table->string('grade', 30);
            $table->string('mutu', 30);
            $table->string('n_atas', 30);
            $table->string('n_bawah', 30);
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
        Schema::dropIfExists('skala_nilai');
    }
}
