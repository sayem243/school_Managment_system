<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillGeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_generates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('zone_id')->unsigned();
            $table->integer('package_id')->unsigned()->nullable(true);
            $table->integer('collection_id')->unsigned()->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_generates');
    }
}
