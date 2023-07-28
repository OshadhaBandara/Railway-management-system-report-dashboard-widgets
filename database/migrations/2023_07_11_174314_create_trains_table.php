<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id('train_id');
            $table->string('train_name');
            $table->integer('seat_cat_1')->nullable();
            $table->integer('seat_cat_2')->nullable();
            $table->integer('seat_cat_3')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->string('start_station')->nullable();
            $table->dateTime('end_station')->nullable();
            $table->string('arrv_in')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->dateTime('end_dly_at')->nullable();
            $table->boolean('status')->default(false);
            $table->string('routs')->nullable();
            $table->time('delays')->nullable();
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
        Schema::dropIfExists('trains');
    }
}
