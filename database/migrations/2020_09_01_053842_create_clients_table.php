<?php

use Brick\Math\BigInteger;
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
            $table->boolean('surname')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('phone')->unique();
            $table->text('address')->nullable();
            
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable() ;

        });
    }

   public function getFirstNameAttribute($value)
   {
       return ucfirst($value);
   }//end of first name attribute

   public function getLastNameAttribute($value)
   {
       return ucfirst($value);
   }//end of last name attribute
   
    
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
