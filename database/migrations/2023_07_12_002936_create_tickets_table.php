<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('tc_number')->autoIncrement(); // Make passenger_id an auto-incrementing primary key
            $table->bigInteger('passenger_id');
            $table->integer('schedule_id');
            $table->decimal('amount', 8, 2);
            $table->decimal('paid_amount', 8, 2)->default(0);
            $table->integer('payment_status')->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->string('start_station');
            $table->string('end_station');
            $table->dateTime('start_time')->nullable();;
            $table->dateTime('end_time')->nullable();;
            $table->integer('train_id');
            $table->string('train_name');
            $table->string('seat_cat');
            $table->integer('seats');
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
        Schema::dropIfExists('tickets');
    }
}