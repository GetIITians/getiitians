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
			$table->boolean('home_tuition')->nullable()->default(null);
			$table->json('language')->nullable()->default(null);
			$table->integer('experience', false, true)->nullable()->default(null);
			$table->string('resume', 250)->nullable()->default(null);
			$table->integer('balance', false, false)->nullable()->default(null);
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
