<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskTable extends Migration {

	public function up()
	{
		Schema::create('task', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('project_id')->constrained('project');
			$table->string('task_title', 100);
			$table->date('task_startdate');
			$table->date('task_enddate');
			$table->string('task_details', 100);
			$table->string('task_status', 100);
			$table->string('task_type', 100);
			
		});
	}

	public function down()
	{
		Schema::drop('task');
	}
}