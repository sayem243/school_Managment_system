<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBillMonthColumnToBillGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_generates', function (Blueprint $table) {
            $table->string('billMonth')->nullable(true);
            $table->string('process')->default(0);
            $table->integer('billYear')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_generates', function (Blueprint $table) {
            //
        });
    }
}
