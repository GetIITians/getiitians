<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
			$table->string('gender', 6)->nullable()->default(NULL);
			$table->date('date_of_birth')->nullable()->default(NULL);
			$table->string('address_country')->nullable()->default(NULL);
			$table->string('address_city')->nullable()->default(NULL);
			$table->string('address_state')->nullable()->default(NULL);
			$table->string('address_pin')->nullable()->default(NULL);
			$table->integer('phone',15)->nullable()->default(NULL);
            $table->rememberToken();
			$table->morphs('deriveable');
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
        Schema::drop('users');
    }
}
