<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suppliner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliners', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_suppliner', 100);
            $table->string('alamat', 50);
            $table->biginteger('no_hp');
            $table->string('deskripsi', 300)->nullable();
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
