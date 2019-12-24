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
            $table->unsignedBigInteger('class_name');
            $table->unsignedBigInteger('admissionFees');
            $table->unsignedBigInteger('monthly_fee');
            $table->unsignedBigInteger('exam_fee');

            $table->foreign('class_name')->references('id')->on('studentclasses')->nullable();
            $table->foreign('admissionFees')->references('id')->on('studentclasses')->nullable();
            $table->foreign('monthly_fee')->references('id')->on('studentclasses')->nullable();
            $table->foreign('exam_fee')->references('id')->on('studentclasses')->nullable();


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
