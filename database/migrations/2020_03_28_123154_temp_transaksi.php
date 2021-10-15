<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TempTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_transactions', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_barang', 100);
            $table->string('qty', 100);
            $table->string('qty_lama', 100);
            $table->string('harga', 100);
            $table->string('tanggal', 100)->nullable();
            $table->string('diskon', 100)->nullable();
            $table->string('nama_customer')->nullable();
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
