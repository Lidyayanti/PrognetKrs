<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("nim",12);
            $table->string('nama',100);
            $table->string("alamat",255);
            $table->string("telepon",30);
            $table->string("email",200);
            $table->string("password",200);
            $table->enum("program_studi",['Teknologi Informasi','Teknik Mesin','Teknik Sipil','Teknik Arsitektur']);
            $table->year("angkatan",4);
            $table->string("foto_mahasiswa",255);
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
