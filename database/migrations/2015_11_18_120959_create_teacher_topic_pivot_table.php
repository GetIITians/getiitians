<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTopicPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_topic', function (Blueprint $table) {
			$table->integer('teacher_id')->unsigned()->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('topic_id')->unsigned()->index();
			$table->foreign('topic_id')->references('id')->on('topics')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('fees');
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
		Schema::table('teacher_topic', function (Blueprint $table){
			$table->dropForeign('teacher_topic_teacher_id_foreign');
			$table->dropForeign('teacher_topic_topic_id_foreign');
		})
        Schema::drop('teacher_topic');
    }
}
