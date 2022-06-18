<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesehatanMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan_mhs', function (Blueprint $table) {
            $table->id('id_kesehatanmhs');
            $table->integer('id_mhs');
            $table->string('gdarah', 10);
            $table->string('rpenyakit', 500);
            $table->string('tb', 20);
            $table->string('bb', 20);
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
        Schema::dropIfExists('kesehatan_mhs');
    }
}
