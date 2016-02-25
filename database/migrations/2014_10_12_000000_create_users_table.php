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
			$table->string('picture')->nullable();
			$table->string('gender', 6)->nullable()->default(null);
			$table->date('date_of_birth')->nullable()->default(null);
			$table->string('address_country')->nullable()->default(null);
			$table->string('address_city')->nullable()->default(null);
			$table->string('address_state')->nullable()->default(null);
			$table->string('address_pin')->nullable()->default(null);
            $table->text('introduction');
			$table->bigInteger('phone', false, true)->nullable()->default(null);
            $table->rememberToken()->nullable()->default(null);
			$table->boolean('email_confirmed')->default(0);
			$table->string('email_confirmation_code')->nullable();
            $table->boolean('phone_confirmed')->default(0);
            $table->string('phone_confirmation_code')->nullable();
            $table->morphs('derivable');
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
