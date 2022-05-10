<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEarnLeaveTable extends Migration {

	public function up()
	{
		Schema::create('earn_leave', function(Blueprint $table) {
			$table->increments('id');
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('start_date', 200);
			$table->string('end_date', 500);
			
		});
	}

	public function down()
	{
		Schema::drop('earn_leave');
	}
}