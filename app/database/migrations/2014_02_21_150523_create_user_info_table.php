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
            $table->date('birth_date');
            $table->date('year_graduated');    
            $table->string('course');      
            $table->string('civil_stat');
            $table->string('address');
            $table->string('company');             
           	$table->string('company_address');
           	$table->string('job_nature');
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
