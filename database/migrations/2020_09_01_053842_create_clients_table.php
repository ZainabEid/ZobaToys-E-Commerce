<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('phone')->unique();
            $table->text('address');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');


            $table->timestamps();
        });
    }

   public function getNameAttribute($value)
   {
       return ucfirst($value);
   }
    
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
