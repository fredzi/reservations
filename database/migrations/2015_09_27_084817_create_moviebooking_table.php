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
        /**
         * Sale
         * - sal moze byc kilka w kazdym kinie 
         * - w panelu bedzie mozna dodawac, edytowac, usuwac sale
         */
        Schema::create('halls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('seats');
            $table->integer('user_id')->unsigned();
            $table->integer('position');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        /**
         * Miejsca w sali 
         * - podczas dodawania sali w drugim kroku określa się, ktore miejsca
         * sa zablokowane i reszta wpada do tej tabeli
         */
        Schema::create('seats_in_halls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_x'); // miejsce w rzedzie
            $table->integer('pos_y'); // rzad
            $table->integer('hall_id')->unsigned();
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
        });
        
        /**
         * Filmy 
         * - przed ustaleniem repertuaru trzeba określić filmy jakie kino wyświetla
         */
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // tytul filmu
            $table->string('original_title'); // tytul oryginalny 
            $table->integer('time'); // czas trwania
            $table->string('describtion'); // opis filmu
            $table->decimal('price', 11, 2); // opcjonalnie inna cena na seans tego filmu
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    
        /**
         * Repertuar
         * - polaczenie filmu i sali o podanej godzinie 
         */
        Schema::create('repertoire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hall_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->datetime('time');
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
        /**
         * Typy klientow 
         * - dodawane w panelu kina 
         * - kazdy typ musi miec cene np. bilet ulgowy 9 zl, normalny 10 zl
         */
        Schema::create('spectators_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        /**
         * Rezerwacje
         * - klienci po stronie publicznej beda skladac rezerwacje na seans
         */
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repertoire_id')->unsigned();
            $table->decimal('summary',11,2); // cena calej rezerwacji
            $table->datetime('date_start'); // data rozpoczecia wybierania miejsc
            $table->datetime('date_end'); // data zakonczenia wybierania miejsc
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->integer('status'); // status rezerwacji
            $table->timestamps();
            $table->foreign('repertoire_id')->references('id')->on('repertoire')->onDelete('cascade');
        });
        
        /**
         * Wybrane miejsca przy rezerwacji
         */
        Schema::create('reservations_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repertoire_id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table->datetime('date');
            $table->foreign('repertoire_id')->references('id')->on('repertoire')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
        
        /**
         * Typy klientow wybranych podczas rezerwowania miejsc
         */
        Schema::create('reservations_spectators_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id');
            $table->integer('spectator_type_id');
            $table->integer('count');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
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