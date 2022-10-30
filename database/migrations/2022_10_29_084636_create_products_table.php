<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varian', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('sku');
            $table->integer('price');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('sku');
            $table->string('brand');
            $table->integer('id_varian');
            $table->foreign('id_varian')->references('id')->on('varian');
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
        Schema::dropIfExists('products');
         Schema::dropIfExists('varian');
    }
}