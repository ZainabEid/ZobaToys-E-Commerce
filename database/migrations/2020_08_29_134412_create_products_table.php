<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('vendor_id')->unsigned();
            $table->double('perchase_price',8,2);
            $table->double('price',8,2);
            $table->double('sale',8,2)->default(10);
            $table->boolean('in_sale')->default(false);
            $table->integer('stock');

            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
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
    }
}
