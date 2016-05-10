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
            $table->boolean('display')->nullable()->default(null);
			$table->integer('experience', false, true)->nullable()->default(null);
            $table->integer('minfees', false, true)->nullable()->default(null);
			$table->string('resume', 250)->nullable()->default(null);
            $table->decimal('rating', 3, 2)->nullable()->default(null);
            $table->integer('rating_count', false, true)->nullable()->default(0);
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
