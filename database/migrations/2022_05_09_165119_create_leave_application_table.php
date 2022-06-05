<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaveApplicationTable extends Migration {

	public function up()
	{
		Schema::create('leave_application', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('leave_id')->constrained('leave_type');
			$table->date('start_date');
			$table->date('end_date');
			$table->double('total_day');
			$table->double('day_remain');
			$table->string('reason');
			$table->boolean('status')->nullable(); // approved = 1, pending = null, Reject= 0
		
		});
	}

	public function down()
	{
		Schema::drop('leave_application');
	}
}