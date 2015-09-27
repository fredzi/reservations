<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviebookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cinemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('city');
            $table->string('street');
            $table->string('postcode');
            $table->string('www');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            
            



        });

        Schema::create('halls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('seats');
            $table->integer('cinema_id');
            $table->integer('position');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
    
        });
        
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('original_title');
            $table->integer('time');
            $table->string('describtion');
            $table->decimal('price', 11, 2);
        });
    
            Schema::create('reportoire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hall_id');
            $table->integer('movie_id');
            $table->datetime('time');
        });

            Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repertoire_id');
            $table->decimal('summary',11,2);
            $table->datetime('date_start');
            $table->datetime('date_end');
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->integer('status');
            $table->timestamps();
        });
            
            Schema::create('reservations_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reportoire_id');
            $table->integer('reservation_id');
            $table->datetime('date');
            
        });

            Schema::create('reservations_spectators_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id');
            $table->integer('spectator_type_id');
            $table->integer('count');
        });

            Schema::create('seats_in_halls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_x');
            $table->integer('pos_y');
            $table->integer('hall_id');
            $table->foreign('hall_id')->references('id')->on('halls');
        });

            Schema::create('spectators_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price',11,2);
            $table->integer('cinema_id');
        });
            

    
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cinemas');
        Schema::drop('halls');
        Schema::drop('migrations');
        Schema::drop('movies');
        Schema::drop('reportoire');
        Schema::drop('reservations');
        Schema::drop('reservations_seats');
        Schema::drop('reservations_spectators_types');
        Schema::drop('seats_in_halls');
        Schema::drop('spectators_types');
    }
}
