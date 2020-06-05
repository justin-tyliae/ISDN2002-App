<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_cases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('patient_name');
            $table->string('doctor_name');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->string('alias')->nullable();
            $table->string('doctor_suggestions')->nullable();
            $table->string('patient_feedbacks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_cases');
    }
}
