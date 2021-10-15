<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_produk', 100);
            $table->biginteger('jumlah_produk');
            $table->biginteger('diskon');
            $table->string('total', 300);
            $table->string('jumlah_bayar', 300);
            $table->string('kembalian', 300);
            $table->string('struk', 300);
            $table->string('barcode', 300);
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
