<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPackageIdColumnToCustomerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_histories', function (Blueprint $table) {
            $table->string('username')->nullable(true);
            $table->integer('package_id')->unsigned()->nullable(true);
            $table->integer('zone_id')->unsigned()->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_histories', function (Blueprint $table) {
            //
        });
    }
}
