<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

            //fees=batch
            $table->foreign('studentclasses_id')->references('id')->on('studentclasses');
            $table->unsignedBigInteger('studentclasses_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('admins');

            $table->string('debit');
            $table->string('payment_id')->nullable();
            $table->foreign('fees_id')->references('id')->on('fees');
            $table->unsignedBigInteger('fees_id');

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
        Schema::dropIfExists('student_transactions');
    }
}
