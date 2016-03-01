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
			$table->integer('teacher_id', false, true)->index();
			$table->integer('topic_id', false, true)->index();
            $table->integer('fees', false, true);
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
        Schema::drop('teacher_topic');
    }
}
