<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->string('active_treatments')->nullable();
            $table->string('patient_history')->nullable();
            $table->string('radio_therapy')->nullable();
            $table->string('drug_allergy')->nullable();
            $table->string('other_issues')->nullable();
            $table->string('pregnancy')->nullable();
            $table->string('bad_habits')->nullable();
            $table->string('last_treatment')->nullable();
            $table->string('patient_groups')->nullable();
            $table->text('patient_note')->nullable();

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
        Schema::dropIfExists('patient_details');
    }
}
