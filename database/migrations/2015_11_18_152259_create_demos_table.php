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
			$table->integer('teacher_id', false, true)->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('student_id', false, true)->index();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('session_id', false, true)->index();
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
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
			$table->dropForeign('demos_session_id_foreign');
		});
        Schema::drop('demos');
    }
}
