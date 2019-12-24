<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attendence_date')->nullable();
            $table->string('attendence_month')->nullable();
            $table->string('attendence_year')->nullable();
            $table->string('attendence')->nullable();
            $table->unsignedBigInteger('students_id');
            $table->foreign('students_id')->references('id')->on('admins')->nullable();


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
        Schema::dropIfExists('attendences');
    }
}
