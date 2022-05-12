<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEarnLeaveTable extends Migration {

	public function up()
	{
		Schema::create('earn_leave', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->date('start_date');
			$table->date('end_date');
			
		});
	}

	public function down()
	{
		Schema::drop('earn_leave');
	}
}