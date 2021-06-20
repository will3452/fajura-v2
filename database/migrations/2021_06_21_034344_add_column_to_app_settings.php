<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToAppSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('tel')->nullable();
            $table->string('about_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->dropColumn(['phone', 'tel', 'about_url']);
        });
    }
}
