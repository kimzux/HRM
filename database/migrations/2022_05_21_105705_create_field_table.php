<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldTable extends Migration {

	public function up()
	{
		Schema::create('field', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('project_id')->constrained('project');
			$table->string('field_location', 100);
			$table->date('field_startdate');
			$table->date('field_enddate');
			$table->date('return_date')->nullable();
			$table->double('field_totaldays');
			$table->string('notes', 500);
			$table->boolean('status')->nullable();
		
		});
	}

	public function down()
	{
		Schema::drop('field');
	}
}