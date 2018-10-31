<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trains_id')->unsigned();
            $table->foreign('trains_id')->references('id')->on('trains')->onDelete('cascade');
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
        Schema::dropIfExists('trains_detail');
    }
}
