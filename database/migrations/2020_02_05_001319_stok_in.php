<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StokIn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_ins', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_barang', 100);
            $table->string('barcode', 50)->nullable();
            $table->string('suppliner')->nullable();
            $table->string('satuan_barang', 50);
            $table->string('kategori', 100);
            $table->string('harga_modal', 100);
            $table->string('harga_jual', 100);
            $table->integer('jumlah_produk');
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
