<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBandwidthColumnToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('bandWidth')->nullable(true);
            $table->string('assignBandWidth')->nullable(true);
            $table->string('username')->nullable(true);
            $table->string('connectionMode')->nullable(true);
            $table->date('connectionDate')->nullable(true);
            $table->string('connectionStatus')->nullable(true)->default('In-active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
