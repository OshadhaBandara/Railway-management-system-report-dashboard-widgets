<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrainSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_schedules', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->dateTime('schedule_date');
            $table->text('stations');
            $table->integer('train_id');
            $table->integer('start_station');
            $table->string('start_time');
            $table->integer('end_station');
            $table->string('end_time');
            $table->integer('class_1_seats')->default(0);
            $table->integer('class_2_seats')->default(0);
            $table->integer('class_3_seats')->default(0);
            $table->integer('booked_class_1_seats')->default(0);
            $table->integer('booked_class_2_seats')->default(0);
            $table->integer('booked_class_3_seats')->default(0);
            $table->string('delay')->nullable();
            $table->integer('status')->nullable();
            $table->integer('track_station')->nullable();
            $table->integer('track_station_text')->nullable();
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('train_schedules');
    }
}
