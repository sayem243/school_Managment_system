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
            $table->string('exam_fee')->nullable();
            $table->string('labfee')->nullable();
            $table->unsignedBigInteger('class_name_ID');
            $table->unsignedBigInteger('admissionFees_ID');
            $table->unsignedBigInteger('monthly_fee_ID');
            $table->unsignedBigInteger('exam_fee_ID');

            $table->foreign('class_name_ID')->references('id')->on('studentclasses')->nullable();
            $table->foreign('admissionFees_ID')->references('id')->on('studentclasses')->nullable();
            $table->foreign('monthly_fee_ID')->references('id')->on('studentclasses')->nullable();
            $table->foreign('exam_fee_ID')->references('id')->on('studentclasses')->nullable();


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
