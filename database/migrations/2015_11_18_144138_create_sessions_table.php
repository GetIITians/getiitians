<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('topic_id', false, true)->index();
			$table->integer('teacher_id', false, true)->index();
			$table->integer('student_id', false, true)->index();
			$table->timestamp('start_time');
			$table->string('duration', 10);
			$table->string('link', 250);
			$table->string('wiziq_id');
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
		Schema::drop('sessions');
	}
}
