<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('student_id', false, true)->index();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('session_id', false, true)->index();
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('teacher_id', false, true)->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
			$table->string('review', 1000);
			$table->string('rating', 2);
			$table->boolean('admin_approval');
			$table->boolean('teacher_approval');
			$table->integer('student_likes', false, true);
			$table->integer('student_likes_total', false, true);
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
		Schema::table('reviews', function (Blueprint $table){
			$table->dropForeign('reviews_session_id_foreign');
			$table->dropForeign('reviews_student_id_foreign');
			$table->dropForeign('reviews_teacher_id_foreign');
		});
        Schema::drop('reviews');
    }
}
