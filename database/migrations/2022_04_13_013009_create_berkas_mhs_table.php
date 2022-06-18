<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_mhs', function (Blueprint $table) {
            $table->id('id_bksmhs');
            $table->integer('id_mhs');
            $table->string('ijazah', 100);
            $table->string('ktp', 100);
            $table->string('kk', 100);
            $table->string('akta_lhr', 100);
            $table->string('sertifikat', 100);
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
        Schema::dropIfExists('berkas_mhs');
    }
}
