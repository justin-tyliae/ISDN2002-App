<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->string('patient_name');
            $table->integer('user_id');
            $table->integer('device_id');
            $table->string('device_type');
            $table->string('csv_path')->nullable();
            $table->integer('start_time');
            $table->integer('end_time')->nullable();
            // $table->string('duration_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_data');
    }
}
