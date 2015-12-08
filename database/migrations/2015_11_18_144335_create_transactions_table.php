<?php

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
            $table->increments('id');
			$table->integer('user_id', false, true)->index();
			$table->json('content');
			$table->integer('eot_balance')->nullable()->default(0);
			$table->integer('debit')->nullable()->default(null);
			$table->integer('credit')->nullable()->default(null);
			$table->integer('session_id', false, true)->index()->nullable()->default(null);
			$table->integer('payumoney')->nullable()->default(null);
			$table->string('payumoney_txn_id')->nullable()->default(null);
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
        Schema::drop('transactions');
    }
}
