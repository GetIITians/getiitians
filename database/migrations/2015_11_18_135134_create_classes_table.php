<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('topic_id')->unsigned()->index();
			$table->foreign('topic_id')->references('id')->on('topics')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('teacher_id')->unsigned()->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamp('start_time');
			$table->string('duration', 10);
			$table->string('link', 250);
			$table->string('wiziq_id');
			$table->integer('fees', 10);
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
		Schema::table('classes', function (Blueprint $table){
			$table->dropForeign('classes_teacher_id_foreign');
			$table->dropForeign('classes_topic_id_foreign');
			$table->dropForeign('classes_student_id_foreign');
		})
        Schema::drop('classes');
    }
}
