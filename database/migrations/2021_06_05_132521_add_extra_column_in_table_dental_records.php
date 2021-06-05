<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnInTableDentalRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dental_records', function (Blueprint $table) {
            $table->string('groups');
            $table->timestamp('date_of_initial_symptoms')->nullable();
            $table->timestamp('date_of_dental_work')->default(now());
            $table->string('symptoms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dental_records', function (Blueprint $table) {
            $table->dropColumn(['groups', 'date_of_initial_symptoms', 'date_of_dental_work', 'symptoms']);
        });
    }
}
