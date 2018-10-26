<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transportation_class_id')->unsigned();
            $table->integer('transportation_type_id')->unsigned();
            $table->string('code');
            $table->string('description');
            $table->integer('seat_qty');
            $table->timestamps();

            $table->foreign('transportation_class_id')
                    ->references('id')->on('transportation_class')
                    ->onDelete('cascade');
            $table->foreign('transportation_type_id')
                    ->references('id')->on('transportation_type')
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
        Schema::dropIfExists('transportation');
    }
}
