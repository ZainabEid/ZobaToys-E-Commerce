<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->double('total_price', 8 ,2)->nullable();
            $table->boolean('paid_trigger')->default(false);
            $table->boolean('ship_trigger')->default(false);
            $table->string('status')->default('created');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
       // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
       // Schema::enableForeignKeyConstraints();
    }
}
