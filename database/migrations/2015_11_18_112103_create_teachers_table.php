<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
			$table->boolean('home_tuition')->nullable()->default(0);
			$table->json('language')->nullable()->default(NULL);
			$table->integer('experience', 2)->nullable()->default(0);
			$table->string('resume', 250)->nullable()->default(NULL);
			$table->integer('balance')->nullable()->default(0);
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
        Schema::drop('teachers');
    }
}
