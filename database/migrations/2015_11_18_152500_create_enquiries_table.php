<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
			$table->string('class')->nullable()->default(null);
			$table->string('subject')->nullable()->default(null);
			$table->string('topic')->nullable()->default(null);
			$table->string('enquiry', 1000);
			$table->string('email')->nullable()->default(null);
			$table->bigInteger('phone')->nullable()->default(null);
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
        Schema::drop('enquiries');
    }
}
