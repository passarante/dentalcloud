<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('doctor_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('appointment_type');
            $table->text('appointment_note');
            $table->date('appointment_date');
            $table->dateTime('beg');
            $table->dateTime('end');
            $table->string('color')->nullable();
            $table->boolean('completed')->nullable()->default(1);
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
        Schema::dropIfExists('appointments');
    }
}
