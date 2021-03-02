<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarsTable extends Migration
{
  
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->id();
            $table->integer('stars_count')->default(0);

            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('stars');
    }
}
