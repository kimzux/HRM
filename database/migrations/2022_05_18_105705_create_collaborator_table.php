<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollaboratorTable extends Migration {

	public function up()
	{
		Schema::create('collaborator', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('task_id')->constrained('task');
		
		});
	}

	public function down()
	{
		Schema::drop('collaborator');
	}
}