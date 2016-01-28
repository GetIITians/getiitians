<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id', false, true)->index();
			$table->boolean('home_tuition')->nullable()->default(null);
			$table->string('language', 200)->nullable()->default(null);
			$table->integer('experience', false, true)->nullable()->default(null);
			$table->string('resume', 250)->nullable()->default(null);
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
        Schema::drop('info');
    }
}
