<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZapatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function(Blueprint $table){
            $table->id();
            $table->string('name_category');
            $table->timestamps();
        });

        Schema::create('brand', function(Blueprint $table){
            $table->id();
            $table->string('name_brand');
            $table->timestamps();
        });

        Schema::create('zapatos', function (Blueprint $table) {
            $table->id();
            $table->string('name_shoes');
            $table->string('size_shoes');
            $table->double('price_shoes');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que registra un nuevo zapato');
            $table->foreignId('category_id')->references('id')->on('category')->comment('La categoria del zapato');
            $table->foreignId('brand_id')->references('id')->on('brand')->comment('La marca que pertenece el zapato');
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
        Schema::dropIfExists('category');
        Schema::dropIfExists('brand');
        Schema::dropIfExists('zapatos');

    }
}
