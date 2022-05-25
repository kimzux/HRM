<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogisticTable extends Migration {

	public function up()
	{
		Schema::create('logistic', function(Blueprint $table) {
			$table->id();
			$table->foreignId('asset_id')->constrained('asset');
			$table->foreignId('project_id')->constrained('project');
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('task_id')->constrained('task');
			$table->date('startdate');
			$table->date('enddate');
			$table->string('remark', 200);
			$table->double('quantity');

		});
	}

	public function down()
	{
		Schema::drop('logistic');
	}
}