<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('remarks')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('discount_rate');
            $table->timestamps();
        });

        Schema::create('package_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->onDelete('constrain');
            $table->foreignId('service_id')->onDelete('constrain');
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
        Schema::dropIfExists('packages');
        Schema::dropIfExists('package_service');
    }
}
