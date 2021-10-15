<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_barang', 100)->nullable();
            $table->string('barcode', 50)->nullable();
            $table->string('suppliner')->nullable();
            $table->integer('stok_barang')->nullable();
            $table->string('satuan_barang', 50)->nullable();
            $table->string('kategori', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('harga_modal', 100)->nullable();
            $table->string('harga_jual', 100)->nullable();
            $table->date('tanggal')->nullable();
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
