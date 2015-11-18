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
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->json('content');
			$table->integer('eot_balance');
			$table->integer('debit');
			$table->integer('credit');
			$table->integer('class_id')->unsigned()->index();
			$table->foreign('class_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('payumoney');
			$table->string('payumoney_txn_id');
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
			$table->dropForeign('transactions_class_id_foreign');
		})
        Schema::drop('transactions');
    }
}
