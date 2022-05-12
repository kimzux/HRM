<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaveApplicationTable extends Migration {

	public function up()
	{
		Schema::create('leave_application', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('leave_id')->constrained('leave_type');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('reason');
			$table->boolean('status')->nullable();;
		
		});
	}

	public function down()
	{
		Schema::drop('leave_application');
	}
}