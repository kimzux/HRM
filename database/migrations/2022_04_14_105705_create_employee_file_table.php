<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeFileTable extends Migration {

	public function up()
	{
		Schema::create('employee_file', function(Blueprint $table) {
			$table->increments('id');
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('file_title', 500);
			$table->string('file_url', 500);
		});
	}

	public function down()
	{
		Schema::drop('employee_file');
	}
}