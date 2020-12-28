<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseSupplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_supply', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purchase_id')->unsigned();
            $table->bigInteger('supply_id')->unsigned();
            $table->integer('quantity');

            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_supply');
    }
    
}
