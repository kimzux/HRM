<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeTable extends Migration {

	public function up()
	{
		Schema::create('employee', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('first_name');
			$table->string('last_name');
			$table->foreignId('user_id')->constrained('users');
			$table->foreignId('designation_id')->constrained('designation');
			$table->foreignId('department_id')->constrained('department');
			$table->string('em_code', 60);
			$table->string('em_address', 200);
			$table->boolean('status');
			$table->string('em_gender', 200);
			$table->string('em_phone', 100);
			$table->string('em_birthday', 200);
			$table->string('em_joining_date', 200);
			$table->string('em_contract_end', 200);
			$table->string('em_nid', 200);
			$table->string('em_image', 200);
			
		});
	}

	public function down()
	{
		Schema::drop('employee');
	}
}