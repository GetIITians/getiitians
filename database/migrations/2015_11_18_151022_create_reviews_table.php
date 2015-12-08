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
			$table->integer('session_id', false, true)->index();
			$table->integer('teacher_id', false, true)->index();
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
        Schema::drop('reviews');
    }
}
