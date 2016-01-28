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
			$table->string('image_url')->nullable();
			$table->string('gender', 6)->nullable()->default(null);
			$table->date('date_of_birth')->nullable()->default(null);
			$table->string('address_country')->nullable()->default(null);
			$table->string('address_city')->nullable()->default(null);
			$table->string('address_state')->nullable()->default(null);
			$table->string('address_pin')->nullable()->default(null);
			$table->bigInteger('phone', false, true)->nullable()->default(null);
            $table->rememberToken()->nullable()->default(null);
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code')->nullable();
			$table->softDeletes();
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
