<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_promo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produk_id')->unsigned();
            $table->decimal('harga_awal', 16,2)->default(0);
            $table->decimal('harga_akhir', 16,2)->default(0);
            $table->integer('diskon_persen')->default(0);
            $table->decimal('diskon_nominal', 16,2)->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produk_id')->references('id')->on('produk');
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
        Schema::dropIfExists('produk_promo');
    }
}
