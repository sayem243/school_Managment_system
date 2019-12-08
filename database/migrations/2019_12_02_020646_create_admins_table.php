<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name');
            $table->string('mothername');
            $table->string('fname');
            $table->unsignedBigInteger('studentclasses_id');
            $table->unsignedBigInteger('section');
            $table->integer('mobile');
            $table->string('email')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('father_occupation');
            $table->string('address');
            $table->timestamps();
            $table->foreign('studentclasses_id')->references('id')->on('studentclasses');
            $table->foreign('section')->references('id')->on('studentclasses')->nullable();

        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
