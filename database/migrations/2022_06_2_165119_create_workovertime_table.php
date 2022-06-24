<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkOverTimeTable extends Migration {

	public function up()
	{
		Schema::create('workovertime', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->double('amount', 15,2);
			
			
		});
	}

	public function down()
	{
		Schema::drop('workovertime');
	}
}