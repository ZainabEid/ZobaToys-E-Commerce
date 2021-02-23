<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrapTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrap_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wrap_id')->unsigned();
            $table->string('locale')->index(); //lang of the stored record

            $table->string('name');
            $table->string('description');

            $table->unique(['wrap_id','locale']);
            $table->foreign('wrap_id')->references('id')->on('wraps')->onDelete('cascade');
   
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wrap_translations');
    }
}
