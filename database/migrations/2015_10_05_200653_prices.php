<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Ceny biletow w zaleznosci od filmu
         */
        Schema::create('movies_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->integer('spectator_type_id')->unsigned();
            $table->decimal('price', 11, 2); 
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('spectator_type_id')->references('id')->on('spectators_types')->onDelete('cascade');
        });
        
        /**
         * Cena za bilety dla danego typu klienta
         */
        Schema::table('spectators_types', function ($table) {
            $table->decimal('price', 11, 2); 
        });
        
        Schema::table('movies', function ($table) {
            $table->dropColumn('price');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies_prices');

        Schema::table('spectators_types', function ($table) {
            $table->dropColumn('price');
        });
        
        Schema::table('movies', function ($table) {
            $table->decimal('price', 11, 2); 
        });
    }
}
