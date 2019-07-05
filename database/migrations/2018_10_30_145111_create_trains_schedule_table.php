<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainsScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('station')->onDelete('cascade');
            $table->integer('trains_detail_id')->unsigned();
            $table->foreign('trains_detail_id')->references('id')->on('trains_detail')->onDelete('cascade');
            $table->string('from');
            $table->string('destination');
            $table->double('eco_seat_pay',30)->nullable();
            $table->double('bus_seat_pay',30)->nullable();
            $table->double('exec_seat_pay',30)->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('trains_schedule');
    }
}
