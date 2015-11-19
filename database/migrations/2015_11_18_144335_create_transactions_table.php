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
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->json('content');
			$table->integer('eot_balance');
			$table->integer('debit')->nullable()->default(null);
			$table->integer('credit')->nullable()->default(null);
			$table->integer('session_id', false, true)->index()->nullable()->default(null);
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::table('transactions', function (Blueprint $table){
			$table->dropForeign('transactions_user_id_foreign');
			$table->dropForeign('transactions_session_id_foreign');
		});
        Schema::drop('transactions');
    }
}
