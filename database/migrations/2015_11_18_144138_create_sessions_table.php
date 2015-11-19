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
			$table->foreign('topic_id')->references('id')->on('topics')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('teacher_id', false, true)->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('student_id', false, true)->index();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::table('sessions', function (Blueprint $table){
			$table->dropForeign('sessions_teacher_id_foreign');
			$table->dropForeign('sessions_topic_id_foreign');
			$table->dropForeign('sessions_student_id_foreign');
		});
		Schema::drop('sessions');
	}
}
