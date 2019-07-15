<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('package_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('collection_id')->unsigned();
            $table->integer('created_id')->unsigned();
            $table->float('amount');
            $table->float('receivable');
            $table->float('advance');
            $table->float('balance');
            $table->string('paymentMethod');
            $table->string('paymentMobile');
            $table->string('transactionId');
            $table->string('remark');
            $table->string('process');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
