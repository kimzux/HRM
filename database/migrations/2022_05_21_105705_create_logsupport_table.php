<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsupportTable extends Migration {

	public function up()
	{
		Schema::create('logsupport', function(Blueprint $table) {
			$table->id();
			$table->foreignId('logistic_id')->constrained('logistic');
			$table->foreignId('project_id')->constrained('project');
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('task_id')->constrained('task');
			$table->date('startdate');
			$table->date('enddate');
			$table->string('remark', 200);
			$table->double('quantity');
			$table->double('remain_quantity');

		});
	}

	public function down()
	{
		Schema::drop('logsupport');
	}
}