<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrxKrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("trx_krss", function (Blueprint $table) {
            $table->id();
            $table->year("tahun_ajaran",4);
            $table->integer("semester")->length(11);
            $table->foreignId("mahasiswa_id")->references("id")->on("mahasiswas")->onDelete("cascade");
            $table->foreignId("matakuliah_id")->references("id")->on("matakuliahs")->onDelete("cascade");
            $table->enum("nilai",["Tunda","A","B","C","D","E"]);
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
