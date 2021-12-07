<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string("kode",20);
            $table->string('nama_matakuliah',100);
            $table->integer("semester")->length(11);
            $table->integer("sks")->length(1);
            $table->enum("program_studi",['Teknologi Informasi','Teknik Mesin','Teknik Sipil','Teknik Arsitektur']);
            $table->enum("status_mk",['Wajib','Pilihan']);
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
        //
    }
}
