<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		 Schema::create('users_info', function ($table) {

            $table->increments('id');
            $table->string('gender');
            $table->date('birthdate');
            $table->date('yeargraduated');    
            $table->string('course');      
            $table->string('civil-stat');
            $table->string('address');
            $table->string('company');             
           	$table->string('company-address');
           	$table->string('job-nature');
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
		//
		 Schema::drop('users_info');
	}

}
