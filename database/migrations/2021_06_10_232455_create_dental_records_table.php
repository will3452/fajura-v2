<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->onDelete('cascade');
            $table->foreignId('dentist_id')->onDelete('cascade');
            $table->timestamp('date_of_initial_symptoms')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('injured')->nullable();
            $table->string('dental_work_carried_out')->nullable();
            $table->timestamp('date_of_dental_work')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('dental_records');
    }
}
