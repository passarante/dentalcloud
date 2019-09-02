<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTreatnmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PatientId')->nullable();
            $table->string('TreatmentDate')->nullable();
            $table->string('TreatmentNote')->nullable();
            $table->string('TreatmentDents')->nullable();
            $table->text('ApplicatedTreatment')->nullable();
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
        Schema::dropIfExists('patient_treatments');
    }
}
