<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationTable extends Migration {

	public function up()
	{
		Schema::create('education', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('education_type', 200);
			$table->string('institute', 200);
			$table->string('result', 100);
			$table->string('year', 200);
		});
	}

	public function down()
	{
		Schema::drop('education');
	}
}