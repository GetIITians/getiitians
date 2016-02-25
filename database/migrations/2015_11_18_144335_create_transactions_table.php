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
            $table->integer('amount', false, true);
			$table->integer('user_id', false, true)->index();
			$table->boolean('type'); // withdrawal(0) / deposit(1)
            $table->string('mode'); //  Virtual / PayU / Cash / Cheque / DD
            $table->integer('eot_balance')->nullable()->default(0);
            $table->string('category'); // Monthly Payment / Lumpsum / Class Booking
            $table->string('note'); // January Monthly Payment
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
