<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rute', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transportation_id')->unsigned();
            $table->integer('rute_id');
            $table->timestamp("depart_at");
            $table->string('rute_from');
            $table->string('rute_to');
            $table->float('price');
            $table->timestamps();

            $table->foreign('transportation_id')
                    ->references('id')->on('transportation')
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
        Schema::dropIfExists('rute');
    }
}
