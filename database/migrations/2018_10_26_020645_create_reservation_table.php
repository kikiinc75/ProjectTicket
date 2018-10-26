<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('rute_id')->unsigned();
            $table->string('reservation_code');
            $table->string('reservation_at');
            $table->timestamp("reservation_date");
            $table->string('seat_code');
            $table->float('price_reservation');
            $table->timestamps();
            
            $table->foreign('users_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->foreign('customer_id')
                    ->references('id')->on('customer')
                    ->onDelete('cascade');
            $table->foreign('rute_id')
                    ->references('id')->on('rute')
                    ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reservation');
    }
}
