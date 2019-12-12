<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fathername');
            $table->string('email');
            $table->string('gender');
            $table->integer('mobile')->unique();
            $table->string('photo')->nullable();
            $table->string('joining_date');
            $table->integer('nid');
            $table->string('CV');
            $table->string('BSC');
            $table->string('MSC')->nullable();
            $table->string('PhD')->nullable();

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
        Schema::dropIfExists('teachers');
    }
}
