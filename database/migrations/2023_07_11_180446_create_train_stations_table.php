<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_stations', function (Blueprint $table) {
            $table->id('st_no');
            $table->string('st_name');
            $table->decimal('ft_class_seat', 8, 2)->nullable();
            $table->decimal('snd_class_seat', 8, 2)->nullable();
            $table->decimal('trd_class_seat', 8, 2)->nullable();
            $table->dateTime('st_arr_time')->nullable();
            $table->dateTime('st_dep_time')->nullable();
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
        Schema::dropIfExists('train_stations');
    }
}
