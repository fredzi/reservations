<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDouseraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->integer('package');
            $table->datetime('package_payment_to');
            $table->decimal('package_last_payment', 11, 2); 
            
            
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function ($table) {
            $table->dropColumn('package');
            $table->dropColumn('package_payment_to');
            $table->dropColumn('package_last_payment');
        });
    }
}
