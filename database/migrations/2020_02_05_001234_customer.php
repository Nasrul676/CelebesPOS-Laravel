<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id', 200);
            $table->string('nama_customer', 100);
            $table->string('alamat', 50);
            $table->biginteger('no_hp');
            $table->biginteger('no_ktp');
            $table->string('deskripsi', 300)->nullable();
            $table->enum('jenis_kelamin',['L','P']);
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
