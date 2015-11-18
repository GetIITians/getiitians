<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('teacher_id')->unsigned()->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('timeslot_id')->unsigned()->index();
			$table->foreign('timeslot_id')->references('id')->on('timeslots')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::table('demos', function (Blueprint $table){
			$table->dropForeign('demos_teacher_id_foreign');
			$table->dropForeign('demos_student_id_foreign');
			$table->dropForeign('demos_timeslot_id_foreign');
		})
        Schema::drop('demos');
    }
}
