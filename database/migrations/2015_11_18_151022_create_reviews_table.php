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
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('class_id')->unsigned()->index();
			$table->foreign('class_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
			$table->string('review', 1000);
			$table->string('rating', 2);
			$table->boolean('admin_approval');
			$table->boolean('teacher_approval');
			$table->integer('student_likes');
			$table->integer('student_likes_total');
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
			$table->dropForeign('reviews_class_id_foreign');
			$table->dropForeign('reviews_student_id_foreign');
		})
        Schema::drop('reviews');
    }
}
