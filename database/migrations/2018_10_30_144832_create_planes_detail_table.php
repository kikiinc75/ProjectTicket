<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planes_id')->unsigned();
            $table->foreign('planes_id')->references('id')->on('planes')->onDelete('cascade');
            $table->string('code')->unique();
            $table->double('eco_seat_pay',30)->nullable();
            $table->double('bus_seat_pay',30)->nullable();
            $table->double('first_seat_pay',30)->nullable();
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
        Schema::dropIfExists('planes_detail');
    }
}
