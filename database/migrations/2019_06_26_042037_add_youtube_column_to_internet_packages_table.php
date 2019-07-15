<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYoutubeColumnToInternetPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internet_packages', function (Blueprint $table) {
            $table->string('youtube')->nullable(true);
            $table->string('bdix')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('ftp')->nullable(true);
            $table->string('internet')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internet_packages', function (Blueprint $table) {
            //
        });
    }
}
