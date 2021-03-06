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
      			$table->timestamp('date_of_birth')->nullable()->default(null);
            $table->string('house')->nullable()->default(null);
            $table->string('street')->nullable()->default(null);
      			$table->string('country')->nullable()->default(null);
      			$table->string('city')->nullable()->default(null);
      			$table->string('state')->nullable()->default(null);
      			$table->string('pin')->nullable()->default(null);
            $table->text('introduction');
      			$table->bigInteger('phone', false, true)->nullable()->default(null);
            $table->boolean('admin')->default(0);
            $table->rememberToken()->nullable()->default(null);
      			$table->boolean('email_confirmed')->default(0);
      			$table->string('email_confirmation_code')->nullable();
            $table->boolean('phone_confirmed')->default(0);
            $table->string('phone_confirmation_code')->nullable();
            $table->morphs('deriveable');
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
