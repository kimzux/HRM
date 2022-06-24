<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalaryTable extends Migration {

	public function up()
	{
		Schema::create('salary', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->double('basic_salary', 15,2);
		
			
		});
	}

	public function down()
	{
		Schema::drop('salary');
	}
}