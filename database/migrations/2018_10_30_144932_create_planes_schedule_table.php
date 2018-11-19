<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airport_id')->unsigned();
            $table->foreign('airport_id')->references('id')->on('airport')->onDelete('cascade');
            $table->integer('planes_detail_id')->unsigned();
            $table->foreign('planes_detail_id')->references('id')->on('planes_detail')->onDelete('cascade');
            $table->string('from');
            $table->string('destination');
            $table->double('eco_seat_pay',30)->nullable();
            $table->double('bus_seat_pay',30)->nullable();
            $table->double('first_seat_pay',30)->nullable();
            $table->datetime('boardingtime');
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
        Schema::dropIfExists('planes_schedule');
    }
}
