<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeTaskTable extends Migration {

	public function up()
	{
		Schema::create('employee_task', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('task_id')->constrained('task');
		
		});
	}

	public function down()
	{
		Schema::drop('employee_task');
	}
}