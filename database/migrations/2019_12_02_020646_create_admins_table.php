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
            $table->bigIncrements('id',1001);
            $table->string('student_name');
            $table->string('mothername');
            $table->string('fname');
            $table->string('emergency_number');
            $table->string('id_no')->unique();
            $table->unsignedBigInteger('studentclasses_id');
            $table->unsignedBigInteger('section');
            $table->integer('father_mobile')->nullable();
            $table->integer('mother_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('father_occupation');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('photo')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->timestamps();
            $table->foreign('studentclasses_id')->references('id')->on('studentclasses');
            $table->foreign('section')->references('id')->on('sections')->nullable();

        });

        //DB::update("ALTER TABLE tests AUTO_INCREMENT = 7000;");

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
