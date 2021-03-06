<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('month_id');
            $table->unsignedBigInteger('class_id');
            $table->string('admissionFee')->nullable();
            $table->string('monthlyFee')->nullable();
            $table->string('examFee')->nullable();
            $table->string('comments')->nullable();
            $table->string('year')->nullable();

            $table->foreign('class_id')->references('id')->on('studentclasses')->nullable();
            $table->foreign('month_id')->references('id')->on('settings')->nullable();
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
        Schema::dropIfExists('fees');
    }
}
