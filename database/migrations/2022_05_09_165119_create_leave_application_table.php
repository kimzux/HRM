<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaveApplicationTable extends Migration {

	public function up()
	{
		Schema::create('leave_application', function(Blueprint $table) {
			$table->increments('id');
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('leave_id')->constrained('leave_type');
			$table->string('start_date', 200);
			$table->string('end_date', 200);
			$table->string('reason');
			$table->boolean('status')->nullable();;
		
		});
	}

	public function down()
	{
		Schema::drop('leave_application');
	}
}