<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hutang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hutang', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama', 100);
            $table->string('jumlah_hutang', 100);
            $table->string('tanggal_hutang', 100);
            $table->string('tanggal_jatuh_tempo', 100);
            $table->string('status', 100);
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
