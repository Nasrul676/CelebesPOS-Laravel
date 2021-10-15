<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StokOut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_outs', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_barang', 100);
            $table->string('barcode', 50)->nullable();
            $table->string('jumlah_barang', 50);
            $table->string('keterangan', 300)->nullable();
            $table->integer('jumlah_stok_out');
            $table->integer('total');
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
