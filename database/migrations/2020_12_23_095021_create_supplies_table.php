<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('group_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('color');
            $table->double('purchase_price',8,2);
            $table->string('image')->default('default.png');
            $table->string('description');
            $table->integer('stock');
            $table->string('stock_unit')->default('pieces');
            
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('supplies');
    }
}
