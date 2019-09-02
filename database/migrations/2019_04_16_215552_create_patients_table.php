<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nationally')->default("TC");
            $table->string('tck_no',11);
            $table->string('passport_no')->nullable();
            $table->string('protocol_no',10);
            $table->string('name',30);
            $table->string('last_name',30);
            $table->string('phone',15);
            $table->string('profession',150)->nulllable();
            $table->string('reference',100)->nulllable();
            $table->date('dob');
            $table->string('lob')->nullable();
            $table->boolean('gender');
            $table->string('blood_type');
            $table->string('face_type')->nullable();
            $table->double('discount_rate')->default(0);
            $table->text('important_note')->nullable();

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
        Schema::dropIfExists('patients');
    }
}
